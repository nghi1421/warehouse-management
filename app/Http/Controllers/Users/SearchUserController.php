<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SearchUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $searchTerm = $request->input('search');

        $users = User::query()
            ->where('id', $searchTerm)
            ->orWhere('name', 'like', "%{$searchTerm}%")
            ->orWhere('email', 'like', "%{$searchTerm}%")
            ->orWhere('address', 'like', "%{$searchTerm}%")
            ->orWhere('phone_number', 'like', "%{$searchTerm}%")
            ->get();

        return view('bewama::pages.dashboard.user.search', compact('users'));
    }
}