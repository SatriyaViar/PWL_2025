<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LevelModel;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    function index() {
        return LevelModel::all();
    }

    function store(Request $request) {
        $level = LevelModel::create($request->all());
        return response()->json($level, 201);
    }

    function show(LevelModel $level) {
        return LevelModel::find($level);
    }

    function update(Request $request, LevelModel $level) {
        $level -> update($request->all());
    }

    function destroy(LevelModel $user){
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus',
        ]);
    }
}
