<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class SearchCustomerController extends Controller
{
    public function __invoke(Request $request)
    {
        $searchTerm = $request->input('search');

        $customers = Customer::query()
            ->where('id', $searchTerm)
            ->orWhere('name', 'like', "%{$searchTerm}%")
            ->orWhere('email', 'like', "%{$searchTerm}%")
            ->orWhere('address', 'like', "%{$searchTerm}%")
            ->orWhere('phone_number', 'like', "%{$searchTerm}%")
            ->get();

        return view('bewama::pages.dashboard.customer.search', compact('customers'));
    }
}