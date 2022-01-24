@extends('index')


@section('content')

    <div class="container-fluid">
        <div class="row">
           @include('const/_nav')
        </div>
        <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="text-center">
                    <form action="{{ route('customerUpdate') }}" method="post" class="form-signin">
                        @csrf
                        @method('PUT')

                        @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif


                        @if(Session::get('fails'))
                            <div class="alert alert-danger">
                                {{ Session::get('fails') }}
                            </div>
                        @endif

                        <h1 class="h3 mb-3 mt-3 font-weight-normal">Customer Details</h1>

                        <span>E- Mail</span>
                        <input type="email" name="email" disabled id="inputEmail" value="{{ $customer->email }}" class="mb-2 form-control">

                        <span>Name</span>
                        <input type="text" name="name" id="inputPassword" value="{{ $customer->name }}" class="mb-2 form-control" >

                        <span>Address</span>
                        <input type="text" name="address" id="inputPassword" value="{{ $customer->customerdetails->address }} " class="mb-2 form-control" >

                        <span>Country</span>
                        <input type="text" name="country" id="inputPassword" value="{{ $customer->customerdetails->country }} " class="mb-2 form-control" >


                        <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                        <p class="mt-5 mb-3 text-muted">Laravel To-do | hs-qwerty</p>
                    </form>
                </div>



            </div>
        </div>
    </div>

@endsection
