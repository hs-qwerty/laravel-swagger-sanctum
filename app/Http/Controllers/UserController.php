<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;


class UserController extends Controller
{

    public function login(Request $request)
    {

        try {

            $fields = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)){
                return response()->json([
                    'status_code' => 401,
                    'message' => 'Unauthorized',

                ]);
            }

            $user = User::where('email', $fields['email'])->first();

            if (!$user || !Hash::check($fields['password'], $user->password )){

                return response()->json([
                    'status_code' => 401,
                    'message' => 'Password Match',
                ]);

            }

            $token = $user->createToken('swapi')->plainTextToken;
            return response()->json([
                'status_code' => 201,
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);


        }catch (Exception $error){

            return response()->json([
                'status_code' => 500,
                'message' => 'Error in login',
                'error' => $error,
            ]);

        }

    }



    public function register(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);


            if($validator->fails()){
                return response([
                    'error' => $validator->errors()->all()
                ], 422);
            }

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);

            $token = $user->createToken('swapi')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response($response,201);

        }catch (Exception $error)
        {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Registration',
                'error' => $error,
            ]);
        }

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return  [
            'message' => 'logout'
            ];
    }
}
