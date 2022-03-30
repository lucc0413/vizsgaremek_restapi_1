<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //write a function called getUser to get a user's id, name, email, telephone and password
    public function getUser(Request $request)
    {
        $user = Auth::user();
        return response()->json($user, 200);
    }
    

    
    //write a function called getName that returns the name of the user in json format

    public function getName()
    {
        $name = Auth::user()->name;

        return response()->json($name);
    }



//write a function called createUser that creates a new user based on the JSON data sent in the request body and returns the new user in JSON format
public function createUser(Request $request)
{
    $fields = $request->validate([
        "name" => "required",
        "email" => "required",
        "password" => "required",
        "telephone" => "required",
    ]);

    $user = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
        "telephone" => $request->telephone,
    ]);

    $token = $user->createToken('authToken')->plainTextToken;

    $response = [
        "user" => $user,
        "token" => $token,
    ];
    return response($response, 201);
}
}