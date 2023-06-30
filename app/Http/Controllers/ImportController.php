<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Import;
use App\Models\User;
use App\Tables\ImportTable;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

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
        $fullImportDetails = $import->load('categories');
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
        $users = User::all();
        $customers = Customer::all();
        return view('bewama::pages.dashboard.import.create', compact('categories', 'users', 'customers'));
    }

    public function store(Request $request, ImportTable $importTable): View
    {
        DB::transaction(function () use ($request) {
            $categories = $request->categories;
            $amount = $request->amount;
            array_walk($amount, function (&$item, $index) {
                $item = ['amount' => $item];
            });
            $user = User::find($request->user_id);
            $customer = Customer::find($request->customer_id);
            // TODO : return view with error message
            if (!$user || !$customer) return redirect('imports.create');
            $newImport =  Import::create([
                'user_id' => $request->user_id,
                'customer_id' => $request->customer_id,
                'status' => 1
            ]);

            $newImport->categories()->sync(array_combine($categories, $amount));
        });

        // TODO : return view with success message
        return view('bewama::pages.dashboard.import.index', compact('importTable'));
    }

    public function update(Request $request, ImportTable $importTable): View
    {
        dd($request->input());

        return view('bewama::pages.dashboard.import.index', compact('importTable'));
    }

    public function destroy(Import $import, ImportTable $importTable): View
    {
        // $import->delete();
        dd($import);
        return view('bewama::pages.dashboard.import.index', compact('importTable'));
    }
}
