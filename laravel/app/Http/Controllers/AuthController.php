<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Farmer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;


class AuthController extends Controller
{

    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }

    public function save(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'repassword' => 'required|same:password'
        ]);


        if($request->type == "1")
        {
            $customer = new Customer();

            $customer->email = $request->email;
            $customer->password = Hash::make($request->password);
            $save = $customer->save();
            $userIp = request()->ip();
            $customer->customerdetails()->create(['ip' => $userIp]);

            if ($save)
            {
                return back()->with('success', 'Register is Success');
            }else {
                return back()->with('fails', 'Register is Fails');
            }

        }else{

            $farmer = new Farmer();

            $farmer->email = $request->email;
            $farmer->password = Hash::make($request->password);
            $save = $farmer->save();
            $userIp = request()->ip();
            $farmer->farmerdetails()->create(['ip' => $userIp]);

            if ($save)
            {
                return back()->with('success', 'Register is Success');
            }else {
                return back()->with('fails', 'Register is Fails');
            }


        }




    }
    public function check(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Customer::where('email','=', $request->email)->first();

        if (!$user)
        {
            return back()->with('fail','fails');
        }else {

            if (Hash::check($request->password, $user->password))
            {
                $request->session()->put('logUser', $user->id);
                return redirect('admin');
            }else {
                return back()->with('fail', 'password');
            }
        }
    }

    public function logout()
    {
        if (session()->has('logUser'))
        {
           session()->pull('logUser');
           return redirect('/login');
        }
    }




       /*
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
            return redirect('login')->with('danger', 'Error');
        }else {

            return redirect('/index')->with('success','Success! ');
        }


    }
       */
}
