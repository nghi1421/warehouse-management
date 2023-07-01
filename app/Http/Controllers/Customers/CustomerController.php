<?php

namespace App\Http\Controllers\Customers;

use App\Tables\CustomerTable;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Customer::class . ',email'],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
        ]);

        try {
            $customer = Customer::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'phone_number' => $request->input('phone_number'),
            ]);

            if (!$customer) {

                throw new Exception();
            }
        } catch (Exception | QueryException $exception) {
            if ($exception instanceof QueryException) {

                return redirect('/dashboard/customers')->with('error', 'Create customer failed');
            }

            return redirect('/dashboard/customers')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/customers')->with('message', 'Create customer successfully');
    }

    public function show(Customer $customer): View
    {
        return view('bewama::pages.dashboard.customer.show', compact('customer'));
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Customer::class . ',email,' . $customer->id],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
        ]);
        try {
            if (!$customer->update($validated)) {

                throw new Exception;
            }
        } catch (Exception | QueryException $exception) {
            if ($exception instanceof QueryException) {

                return redirect('/dashboard/customers')->with('error', 'Update customer failed');
            }

            return redirect('/dashboard/customers')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/customers')->with('message', 'Update customer successfully');
    }


    public function destroy(Customer $customer): RedirectResponse
    {
        try {
            if (!$customer->delete()) {

                throw new Exception('Customer has import or export.');
            }
        } catch (Exception | QueryException $exception) {

            if ($exception instanceof QueryException) {

                return redirect('/dashboard/customers')->with('error', 'Delete customer failed');
            }

            return redirect('/dashboard/customers')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/customers')->with('message', 'Delete customer successfully');
    }
}