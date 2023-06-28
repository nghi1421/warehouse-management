<?php

namespace App\Http\Controllers;

use App\Tables\ExportTable;
use Illuminate\Http\Client\Request;
use Illuminate\View\View;

class ExportController extends Controller
{
    public function index(ExportTable $exportTable): View
    {
        return view('bewama::pages.dashboard.export.index', compact('exportTable'));
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
