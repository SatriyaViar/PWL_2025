<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
     function index() {
        return KategoriModel::all();
    }

    function store(Request $request) {
        $user = KategoriModel::create($request->all());
        return response()->json($user, 201);
    }

    function show (KategoriModel $user) {
        return KategoriModel::find($user);
    }

    function update(Request $request, KategoriModel $user) {
        $user -> update($request->all());
    }

    function destroy (KategoriModel $user){
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus',
        ]);
    }
}
