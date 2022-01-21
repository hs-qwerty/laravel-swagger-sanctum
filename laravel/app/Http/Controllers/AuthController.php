<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function req()
    {
        return view('register');
    }


    public function register(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'repassword' => 'required|same:password'
        ]);


        $fields['password'] = Hash::make($request->password);


        $customer = Customer::create([
            'email' => $fields['email'],
            'password' => $fields['password']
        ]);

        return view('register');

    }


    public function login()
    {
       return view('login');
    }

    public function log(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = Customer::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password))
        {
            return "patates";
        }else {

            return "gel";
        }


    }


}
