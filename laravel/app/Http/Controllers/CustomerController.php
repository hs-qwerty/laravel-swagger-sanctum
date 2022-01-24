<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::find(1);
        //return $customer->customerdetails->address;

        return view('main')->with( 'customer', $customer);
    }

    public function profile()
    {

        $customer = Customer::find(session('logUser'));
        return view('profile.profile')->with('customer', $customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $Customer = Customer::with('customerdetails')->find(session('logUser'));
        $Customer->name = $request->name;
        $Customer->customerdetails->address = $request->address;
        $Customer->customerdetails->country = $request->country;

        $push = $Customer->push();

        if ($push)
        {
            return back()->with('success', 'Customer is Update');
        }else {
            return back()->with('fails', 'Update Fails');
        }

        //$Term->name = $data['name'];
        //$Term->slug = $data['slug'];
        //$Term->TermTaxonomy->taxonomy = 'category';
        //$Term->TermTaxonomy->description = $data['TermTaxonomy']['description'];
        //$Term->push();

        //echo "gel";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
