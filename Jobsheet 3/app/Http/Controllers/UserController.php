<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    public function index(){
        $user = UserModel::Create(
            [
                'username' => 'manager11',
                'nama' => 'Manager11',
                'password' => Hash::make('1234'),
                'level_id' => 2
            ],
        );

        $user-> username = 'manager12';

        $user->save();

        $user->wasChange();
        $user->wasChange();
        $user->wasChange('username');
        $user->wasChange(['username','level_id']);
        $user->wasChange('nama');
        dd($user->wasChange(['nama', 'username']));
    }

}
