<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Tables\CategoryTable;
use App\Tables\ReservationTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryTable $categoryTable): View
    {
        return view('bewama::pages.dashboard.category.index', compact('categoryTable'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Category $category, ReservationTable $reservationTable)
    {
        return view(
            'bewama::pages.dashboard.category.show',
            compact('reservationTable', 'category')
        );
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
