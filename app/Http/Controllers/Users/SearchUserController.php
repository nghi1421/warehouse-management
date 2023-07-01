<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class SearchUserController extends Controller
{
    public function __invoke(User $user, Request $request): View|JsonResponse
    {
        $request->validate([
            'user_id' => ['sometimes', 'integer', 'min:0'],
            'search' => ['sometimes', 'string']
        ]);

        if ($userId = $request->input('user_id')) {
            return new JsonResponse(User::query()->find($userId));
        }

        $searchTerm = $request->input('search');

        $users = User::query()
            ->where('id', $searchTerm)
            ->orWhere('name', 'like', "%{$searchTerm}%")
            ->orWhere('email', 'like', "%{$searchTerm}%")
            ->orWhere('address', 'like', "%{$searchTerm}%")
            ->orWhere('phone_number', 'like', "%{$searchTerm}%")
            ->get();

        return view('bewama::pages.dashboard.user.result', compact('users'));
    }
}