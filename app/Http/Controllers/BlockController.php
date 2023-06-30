<?php

namespace App\Http\Controllers;

use App\Tables\BlockTable;
use Illuminate\Http\Client\Request;
use Illuminate\View\View;

class BlockController extends Controller
{
    public function index(BlockTable $blockTable): View
    {
        return view('bewama::pages.dashboard.block.index', compact('blockTable'));
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
