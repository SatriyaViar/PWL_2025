<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
     function index() {
        return UserModel::all();
    }

    function store(Request $request) {
        $user = UserModel::create($request->all());
        return response()->json($user, 201);
    }

    function show(UserModel $user) {
        return UserModel::find($user);
    }

    function update(Request $request, UserModel $user) {
        $user -> update($request->all());
    }

    function destroy(UserModel $user){
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus',
        ]);
    }
}
