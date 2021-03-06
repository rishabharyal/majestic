<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request['username'],
            'password' => $request['password']
        ];
        $this->validate($request, [
            'username' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($credentials, true)) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Logged in Successfully!',
                ]
            );
        }
        return response()->json(
            [
                'success' => false,
                'message' => 'Incorrect Username or Password.',
            ]
        );
    }
}
