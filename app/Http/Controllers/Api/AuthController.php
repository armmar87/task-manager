<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function login(LoginRequest $request)
    {
        try {
            $data = $this->authService->login(
                $request->email,
                $request->password
            );

            return response()->json([
                'user'  => new UserResource($data['user']),
                'token' => $data['token'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function register(RegisterRequest $request)
    {
        $data = $this->authService->register($request->validated());

        return response()->json([
            'user'  => new UserResource($data['user']),
            'token' => $data['token'],
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
