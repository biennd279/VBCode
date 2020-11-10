<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\Models\Role;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'user' => 'required|string|unique:users',
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|string|min:0'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $validatedData['role_id'] = 3;

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
            'user' => UserResource::make($user),
            'access_token' => $accessToken
        ], 201);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required|string'
        ]);

        if (!auth()->attempt($loginData)) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response()->json([
                'user' => UserResource::make(auth()->user()),
                'access_token' => $accessToken
        ], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
}
