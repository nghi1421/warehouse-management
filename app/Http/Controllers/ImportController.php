<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Import;
use App\Models\User;
use App\Tables\ImportTable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImportController extends Controller
{
    public function index(ImportTable $importTable): View
    {
        return view('bewama::pages.dashboard.import.index', compact('importTable'));
    }

    public function show(Import $import): View
    {
        $user = User::query()->find($import->user_id);
        $customer = Customer::query()->find($import->customer_id);

        $fullImportDetails = $import->query()->with('categories')->get()[0];
        $importDetails = [];

        foreach ($fullImportDetails->categories as $importDetail) {

            $importDetails[] = [
                'category_id' => $importDetail->id,
                'catagory_name' => $importDetail->name,
                'category_unit' => $importDetail->unit,
                'amount' => $importDetail->pivot->amount,
            ];
        }

        return view(
            'bewama::pages.dashboard.import.show',
            compact('import', 'user', 'customer', 'importDetails')
        );
    }

    public function create(): View
    {
        $categories = Category::query()->get();

        return view('bewama::pages.dashboard.import.create', compact('categories'));
    }

    public function store(): View
    {
        return view('bewama::pages.dashboard.import.create');
    }

    public function update(Request $request, ImportTable $importTable): View
    {
        dd($request->input());

        return view('bewama::pages.dashboard.import.index', compact('importTable'));
    }

    public function destroy(Import $import, ImportTable $importTable): View
    {
        return view('bewama::pages.dashboard.import.index', compact('importTable'));
    }
}
