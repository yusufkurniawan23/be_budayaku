<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        Log::info('Registration attempt', ['email' => $request->email]);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'alamat' => 'required|string',
            'role' => 'required|in:user,admin',
        ]);

        if ($validator->fails()) {
            Log::warning('Registration validation failed', ['errors' => $validator->errors()->toArray(), 'email' => $request->email]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        
        Log::info('User registered successfully', ['id' => $user->id, 'email' => $user->email, 'role' => $user->role]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        Log::info('Login attempt', ['email' => $request->email]);
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            Log::warning('Login validation failed', ['errors' => $validator->errors()->toArray()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            Log::warning('Failed login attempt', ['email' => $request->email]);
            return response()->json([
                'message' => 'Invalid login credentials'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        Log::info('User logged in', ['id' => $user->id, 'email' => $user->email]);

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        Log::info('Logout attempt', ['id' => $user->id, 'email' => $user->email]);
        
        $request->user()->currentAccessToken()->delete();
        
        Log::info('User logged out successfully', ['id' => $user->id, 'email' => $user->email]);
        
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        Log::info('User profile accessed', ['id' => $request->user()->id, 'email' => $request->user()->email]);
        return response()->json($request->user());
    }
}