<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // public function register(RegisterRequest $request)
    // {
    //     try {
    //         // $validated = $request->validated();

    //         $validator = Validator::make($request->all());

    //         if ($validator->fails()) {
    //             return response()->json(['errors' => $validator->errors()], 422);
    //         }

    //         $validated = $validator->validated();
    //         // register user
    //         $user = User::create([
    //             'first_name' => $validated['first_name'],
    //             'last_name' => $validated['last_name'],
    //             'email' => $validated['email'],
    //             'password' => bcrypt($validated['password']),
    //             'phone_number' => $validated['phone_number'],
    //             'shipping_address' => $validated['shipping_address']
    //         ]);

    //         return response()->json($user, 201);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'message' => 'An error occurred while registering the user.',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }

    // }

    public function register(RegisterRequest $request)
    {

        $rules = $request->rules();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone_number' => $validated['phone_number'],
            'shipping_address' => $validated['shipping_address']
        ]);

        return response()->json($user, 201);
    }

    public function login()
    {
        
    }
}
