<?php

namespace App\Http\Controllers\Customers;

use App\Tables\CustomerTable;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(CustomerTable $customerTable): View
    {
        return view('bewama::pages.dashboard.customer.index', compact('customerTable'));
    }

    public function create()
    {
        return view('bewama::pages.dashboard.customer.create');
    }

    public function store(Request $request, CustomerTable $customerTable)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Customer::class . ',email'],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
        ]);
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        return view('bewama::pages.dashboard.customer.index', compact('customerTable'));
    }

    public function show(Customer $customer)
    {
        return view('bewama::pages.dashboard.customer.show', compact('customer'));
    }

    public function edit(Request $request, Customer $customer)
    {
        dd($customer, $request->all());;
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        return view('bewama::pages.dashboard.customer.index', compact('customerTable'));
    }

    public function update(Request $request, Customer $customer, CustomerTable $customerTable)
    {
        // dd($request->all(), $customer, $customer->isDirty());
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Customer::class . ',email,' . $customer->id],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
        ]);
        $customer->update(
            $validated
        );
        return view('bewama::pages.dashboard.customer.index', compact('customerTable'));
    }


    public function destroy(Customer $customer)
    {
        dd($customer);
    }
}
