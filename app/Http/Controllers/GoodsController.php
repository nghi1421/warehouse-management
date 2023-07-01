<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Tables\GoodsTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index(GoodsTable $goodsTable): View
    {
        return view('pages.dashboard.goods.index', compact('goodsTable'));
    }

    public function store(Request $request)
    {
    }

    public function show(Goods $good): View
    {
        $goods = clone ($good);

        $position = $goods->position;

        $import = $goods
            ->import()
            ->with('user')
            ->with('customer')
            ->get()[0];

        $export = $goods
            ->export
            ?->with('user')
            ->with('customer')
            ->get()[0];

        $category = $goods->category;

        return view(
            'pages.dashboard.goods.show',
            compact('goods', 'position', 'import', 'export', 'category')
        );
    }


    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}