<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginCheckAction
{
    public function __construct()
    {}
    public function handle(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)) {
            $response['message'] = "Bad creds";
            $response['status'] = false;
            return $response;
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response['status'] = true;
        $response['token'] = $token;
        return $response;
    }
}
