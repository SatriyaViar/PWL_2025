<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        return 'Ini adalah halaman profil pengguna.';
    }
}