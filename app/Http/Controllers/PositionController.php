<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Tables\PositionTable;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PositionTable $positionTable): View
    {
        return view('bewama::pages.dashboard.position.index', compact('positionTable'));
    }


    public function create(): View
    {
        return view('bewama::pages.dashboard.position.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'shelf_name' => ['required', 'string'],
            'block_name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'created_at' => ['sometimes', 'date_format:Y-m-d H:i:s']
        ]);

        try {
            if (!Position::query()->create([
                'shelf_name' => $request->input('shelf_name'),
                'block_name' => $request->input('block_name'),
                'description' => $request->input('description'),
                'created_at' => $request->input('created_at'),
            ])) {

                throw new Exception();
            }
        } catch (Exception | QueryException $exception) {

            if ($exception instanceof QueryException) {

                return redirect('/dashboard/positions')->with('error', 'Block and shelf exists');
            }
            return redirect('/dashboard/positions')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/positions')->with('message', 'Create position successfully');
    }

    public function show(Position $position): View
    {
        return view('bewama::pages.dashboard.position.show', compact('position'));
    }

    public function update(Request $request, Position $position): RedirectResponse
    {
        $request->validate([
            'shelf_name' => ['required', 'string'],
            'block_name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'created_at' => ['required', 'date_format:Y-m-d H:i:s']
        ]);

        try {
            if (
                $request->input('block_name') !== $position->block_name ||
                $request->input('shelf_name') !== $position->shelf_name
            ) {
                if (!$position->delete()) {

                    throw new Exception;
                }

                if (!Position::query()->create([
                    'shelf_name' => $request->input('shelf_name'),
                    'block_name' => $request->input('block_name'),
                    'description' => $request->input('description'),
                    'created_at' => $request->input('created_at'),
                ])) {

                    throw new Exception();
                }
            } else {
                if (!$position->update([
                    'description' => $request->input('description'),
                    'created_at' => $request->input('created_at'),
                ])) {

                    throw new Exception();
                }
            }
        } catch (Exception | QueryException $exception) {

            if ($exception instanceof QueryException) {

                return redirect('/dashboard/positions')->with('error', 'Block and shelf exists');
            }
            return redirect('/dashboard/positions')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/positions')->with('message', 'Update position successfully');
    }

    public function destroy(Position $position)
    {
        try {
            if (!$position->delete()) {

                throw new Exception;
            }
        } catch (Exception $exception) {

            return redirect('/dashboard/positions')->with('error', $exception->getMessage());
        }

        return redirect('/dashboard/positions')->with('message', 'Delete position successfully');
    }
}