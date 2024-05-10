<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * Register a new user.
     *
     * @param Request $request The incoming request data.
     * @throws \Illuminate\Validation\ValidationException When validation fails.
     * @return \Illuminate\Http\JsonResponse The JSON response with the token and status code.
     */
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        # Return a 422 Unprocessable Entity response containing the validation errors
        # if the validation fails.
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Generate a new personal access token for the user.
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }
}
