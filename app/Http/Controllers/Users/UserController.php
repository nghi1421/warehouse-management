<?php

namespace App\Http\Controllers\Users;

use App\Tables\UserTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(UserTable $userTable): View
    {
        return view('bewama::pages.dashboard.user.index', compact('userTable'));
    }

    public function create()
    {
        return view('bewama::pages.dashboard.user.create');
    }

    public function store(Request $request, UserTable $userTable)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'dob' => ['sometimes', 'date'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'working' => true,
            'dob' => $request->dob,
        ]);

        return view('bewama::pages.dashboard.user.index', compact('userTable'));
    }

    public function show(User $user)
    {
        return view('bewama::pages.dashboard.user.show', compact('user'));
    }

    public function update(Request $request, User $user, UserTable $userTable)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $user->id],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'dob' => ['sometimes', 'date'],
            // 'working' => ['sometimes', 'in:on,true,1,0,false']
        ]);
        $user->update($validated);
        return view('bewama::pages.dashboard.user.index', compact('userTable'));
    }


    public function destroy(string $id)
    {
    }
}
