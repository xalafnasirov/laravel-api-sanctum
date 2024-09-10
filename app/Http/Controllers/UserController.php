<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function register(Request $request)
    {
        $details = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $details['name'],
            'email' => $details['email'],
            'password' => bcrypt($details['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response(
            [
                'user' => $user,
                'token' => $token
            ],
            201
        );

    }

    function login(Request $request) {}
}
