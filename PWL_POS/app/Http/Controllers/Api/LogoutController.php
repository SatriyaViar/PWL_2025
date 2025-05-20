<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    function __invoke(Request $request)
    {
        //remove Token 
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if ($removeToken) {
            //return response JSON
            return response()->JSON([
                'success' => true,
                'message' => 'Logout Berhasil',
            ]);
        }
    }
}
