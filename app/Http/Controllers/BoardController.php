<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{

    public function index()
    {
        $boards = Board::all();

        return response()->json([
            'boards' => $boards,
            'code' => 200
        ], 200);
    }

    public function store(Request $request)
    {
        $board = Board::create([
            'title' => $request->title,
            'worker_id' => $request->worker_id
        ]);

        return response()->json([
            'message' => 'Has been created',
            'board' => $board,
            'code' => 201
        ], 201);
    }

    public function show(Board $board)
    {
        return response()->json([
            'board' => $board,
            'code' => 200
        ], 200);
    }

    public function update(Request $request, Board $board)
    {
        $board->fill($request->all())->save();

        return response()->json([
            'message' => 'Has been updated',
            'board' => $board,
            'code' => 201
        ], 201);
    }

    public function destroy(Board $board)
    {
        $board->delete();

        return response()->json([
            'message' => 'Has been deleted',
            'code' => 200
        ], 200);
    }
}
