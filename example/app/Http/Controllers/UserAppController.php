<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;


class UserAppController extends Controller
{


    public function register(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6|confirmed',
            ]);

            if($validator->fails()){
                return response([
                    'error' => $validator->errors()->all()
                ], 422);
            }

            $request['password'] = Hash::make($request['password']);
            $request['remember_token'] = Str::random(10);

            $user = UserApp::create($request->toArray());

            return response()->json([
                'status_code' => 200,
                'message' => 'Registration Successfull',
            ]);


        }catch(Exception $error){
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Registration',
                'error' => $error,
            ]);
        }


    }

    public function login(Request $request){

        try{
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)){
                return response()->json([
                    'status_code' => 422,
                    'message' => 'Unauthorized',

                ]);
            }

            $user =  User::where('email', $request->email)->first();

            if(!Hash::check($request->password, $user->password, [])){
                return response()->json([
                    'status_code' => 422,
                    'message' => 'Password Match',

                ]);
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);

        }catch(Exception $error){
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in login',
                'error' => $error,
            ]);
        }

    }
    //
}
