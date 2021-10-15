<?php

namespace App\Http\Controllers;

use App\Models\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        return response()->json([
            'workers' => $workers,
            'code' => 200
        ], 200);
    }
}
