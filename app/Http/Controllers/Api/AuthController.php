<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    //register
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:6'],
                    'phone' => ['required', 'string', 'min:10'],
                    'address' => ['required', 'string', 'max:255'],
                    'gender' => ['nullable', 'string', 'max:6'],
                ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender
            ]);

            if ($user->save()) {
                $token = $user->createToken('auth_token')->plainTextToken;

                //email verification
                $user->sendEmailVerificationNotification();

                return response()->json([
                    'status' => true,
                    'message' => 'User created successfully. Verify your email.',
                    'token' => $token
                ], 201);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    //login
    public function login(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Attempt to log in the user
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid login details'
                ], 401);
            }

            // Get the authenticated user
            $user = User::where('email', $request->email)->firstOrFail();

            // Create a new token for the user
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'User logged in successfully',
                'token' => $token
            ], 200);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 422);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    //profile data
    public function profile(Request $request)
    {
        $userdata = \auth()->user();
        return response()->json([
            'status' => true,
            'message' => 'User profile data before editing',
            'data' => $userdata,
        ], 200);
    }

    //profile edit
    public function editProfile(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'min:10'],
                'address' => ['required', 'string', 'max:255'],
                'gender' => ['nullable', 'string', 'max:6'],
            ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user1 = $request->user();

        $user = $request->user()->forceFill([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'gender' => $request->gender
                ])->save();

        $user2 = $request->user();

        if($user){
            return response()->json([
                'status' => true,
                'message' => "User profile updated successfully. Previous data = $user1",
                'data' => $user2,
            ]);
        }
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully',
        ], 200);
    }
}
