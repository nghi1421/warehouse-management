<?php

namespace App\Http\Controllers;

use App\Actions\DeleteImport;
use App\Actions\GenerateGoodsFromImport;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Import;
use App\Models\User;
use App\Tables\ImportTable;
use Exception;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Http\RedirectResponse;
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
        $user = $import->user;

        $customer = $import->customer;

        $fullImportDetails = $import->load('categories');

        $importDetails = [];

        $categories = Category::query()->get();

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
            compact('import', 'user', 'customer', 'importDetails', 'import', 'categories')
        );
    }

    public function create(): View
    {
        $categories = Category::query()->get();

        return view('bewama::pages.dashboard.import.create', compact('categories'));
    }

    public function store(
        Request $request,
        GenerateGoodsFromImport $generateGoods
    ): RedirectResponse {
        $request->validate([
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'customer_id' => ['required', 'numeric', 'exists:customers,id'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['required', 'numeric', 'exists:categories,id'],
            'amounts' => ['required', 'array', 'min:1'],
            'amounts.*' => ['required', 'numeric', 'min:1'],
        ]);

        try {
            DB::beginTransaction();

            $categories = $request->input('categories');

            $amounts = $request->input('amounts');

            array_walk($amounts, function (&$item) {
                $item = ['amount' => $item];
            });

            $newImport =  Import::create([
                'user_id' => $request->user_id,
                'customer_id' => $request->customer_id,
                'status' => 1
            ]);

            $newImport->categories()->sync(array_combine($categories, $amounts));

            if (!$generateGoods->handle($newImport)) {

                DB::rollback();

                throw new Exception;
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();

            return redirect('dashboard/imports')->with('error', $exception->getMessage());
        }

        return redirect('dashboard/imports')->with('message', __('Create import successfully'));
    }

    public function update(Import $import, Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'customer_id' => ['required', 'numeric', 'exists:customers,id'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['required', 'numeric', 'exists:categories,id'],
            'amounts' => ['required', 'array', 'min:1'],
            'amounts.*' => ['required', 'numeric', 'min:1'],
        ]);

        try {
            DB::beginTransaction();

            $categories = $request->input('categories');

            $amounts = $request->input('amounts');

            $importDetails = $import->load('categories');


            ##TODO: update import
            foreach ($importDetails->categories as $importDetail) {


                dd($importDetail->pivot->amount);
                dd($importDetail->pivot->get()->toArray());
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();

            return redirect('dashboard/imports')->with('error', $exception->getMessage());
        }

        return redirect('dashboard/imports')
            ->with('message', __('Update import successfully'));
    }

    public function destroy(Import $import, DeleteImport $deleteImport): RedirectResponse
    {
        return $deleteImport->handle($import) ?
            redirect('dashboard/imports')
            ->with('message', __('Delete import successfully')) :
            redirect('dashboard/imports')
            ->with('error', __('Delete import failed'));
    }
}