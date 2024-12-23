<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {}
    public function delete(){

        auth()->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => "exit was successful",
        ], 200);
    }
}
