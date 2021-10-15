<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{

    public function show(Board $board)
    {
        $publications = Publication::where('board_id', $board->id)->get();

        return response()->json([
            'publications' => $publications,
            'code' => 200
        ], 200);
    }

    public function store(Request $request)
    {
        $publication = Publication::create([
            'description' => $request->description,
            'board_id' => $request->board_id,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'message' => 'Has been created',
            'publication' => $publication,
            'code' => 201
        ], 201);
    }

    public function update(Request $request, Publication $publication)
    {
        $publication->fill($request->all())->save();

        return response()->json([
            'message' => 'Has been updated',
            'publication' => $publication,
            'code' => 201
        ], 201);
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();

        return response()->json([
            'message' => 'Has been deleted',
            'code' => 200
        ], 200);
    }
}
