<?php

namespace App\Http\Controllers;

use App\Models\Gledalac;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends Controller
{
    /**
     * Create an instace of UserAuthController
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['login', 'register']]);
    }

    /**
     * Register a User
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $gledalac = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User registered successfully',
            'user' => Gledalac::find($gledalac->id),
        ], 201);
    }

    /**
     * Get a JWT token after successful login
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['status' => 'failed', 'message' => 'Invalid email and password.', 'error' => 'Unauthorized'], 401);
        }

        return $this->getLoginResponse($token);
    }

    /**
     * Get the token array structure.
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getLoginResponse($token)
    {
        return response()->json([
            'access_token' => $token,
            //  'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->gledalac(),
        ]);
    }

    /**
     * Refresh a JWT token
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * Get the Auth user using token.
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return response()->json(auth()->gledalac());
    }

    /**
     * Logout user (Invalidate the token).
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['status' => 'success', 'message' => 'User logged out successfully']);
    }
}
