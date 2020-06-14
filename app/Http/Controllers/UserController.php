<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listarUsuarios(){
        $user = User::get();

        return response()->json([
            'data' => $user,
        ], 200,
            ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
