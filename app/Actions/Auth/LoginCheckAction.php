<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;

class LoginCheckAction
{
    public function __construct()
    {}
    public function handle(array $data)
    {
        if (Auth::attempt($data)) {

            $user = Auth::user();

            $userToken = $user->createToken('AppToken')->plainTextToken;
            return $userToken;
        } else {
            return false;
        }
    }
}
