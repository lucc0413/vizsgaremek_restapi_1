<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function register(Request $request)
    {
        $fields = $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);



        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            "user" => $user,
            "token" => $token,
        ];
        return response($response, 201);
    }



    public function login(Request $request)
    {
        $fields = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        //Check email
        $user = User::where('email', $request->email)->first();

        //check password    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "message" => "Invalid credentials"
            ], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            "user" => $user,
            "token" => $token,
        ];
        return response($response, 201);
    }
}
