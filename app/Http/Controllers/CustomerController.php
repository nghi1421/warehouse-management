<?php

namespace App\Http\Controllers;

use App\Tables\CustomerTable;
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
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }


    public function destroy(string $id)
    {
    }
}
