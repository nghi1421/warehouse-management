<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class SearchCustomerController extends Controller
{
    public function __invoke(Request $request): View|JsonResponse
    {
        $request->validate([
            'customer_id' => ['sometimes', 'integer', 'min:0'],
            'search' => ['sometimes', 'string']
        ]);

        if ($customerId = $request->input('customer_id')) {
            return new JsonResponse(Customer::query()->find($customerId));
        }

        $searchTerm = $request->input('search');

        $customers = Customer::query()
            ->where('id', $searchTerm)
            ->orWhere('name', 'like', "%{$searchTerm}%")
            ->orWhere('email', 'like', "%{$searchTerm}%")
            ->orWhere('address', 'like', "%{$searchTerm}%")
            ->orWhere('phone_number', 'like', "%{$searchTerm}%")
            ->get();

        return view('bewama::pages.dashboard.customer.result', compact('customers'));
    }
}