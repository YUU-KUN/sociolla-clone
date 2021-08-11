<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function getAllUser(Request $request)
    {
        $users = User::all();
        return response()->json($users);
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['level'] = 'user';
        $user = User::create($input);
        return $user;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        return response()->json(['token' => $user->token], 200);
    }

    public function updateProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->update($request->all());
        return response()->json([
            'success' => 1,
            'message' => 'Profile updated successfully',
            'data' => $user
        ]);
    }
}
