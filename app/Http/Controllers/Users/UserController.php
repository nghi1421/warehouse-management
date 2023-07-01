<?php

namespace App\Http\Controllers\Users;

use App\Tables\UserTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(UserTable $userTable): View
    {
        return view('bewama::pages.dashboard.user.index', compact('userTable'));
    }

    public function create(): View
    {
        return view('bewama::pages.dashboard.user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'dob' => ['sometimes', 'date'],
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'working' => true,
                'dob' => $request->dob,
            ]);
        } catch (Exception | QueryException $exception) {

            if ($exception instanceof QueryException) {

                return redirect('/dashboard/users')->with('error', 'Create user failed');
            }

            return redirect('/dashboard/users')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/users')->with('message', 'Create user successfully');
    }

    public function show(User $user): View
    {
        return view('bewama::pages.dashboard.user.show', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $user->id],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'dob' => ['sometimes', 'date'],
        ]);

        try {
            if (!$user->update($validated)) {

                throw new Exception();
            }
        } catch (Exception | QueryException $exception) {
            if ($exception instanceof QueryException) {

                return redirect('/dashboard/users')->with('error', 'Update user failed');
            }

            return redirect('/dashboard/users')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/users')->with('message', 'Update user successfully');
    }


    public function destroy(User $user): RedirectResponse
    {
        if ($user->getKey() === Auth::id()) {

            return redirect('/dashboard/users')->with('warning', 'It\'s you bro');
        }

        try {
            if (!$user->delete()) {

                throw new Exception('User has import or export.');
            }
        } catch (Exception | QueryException $exception) {

            if ($exception instanceof QueryException) {

                return redirect('/dashboard/users')->with('error', 'Delete user failed');
            }

            return redirect('/dashboard/users')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/users')->with('message', 'Delete user successfully');
    }
}