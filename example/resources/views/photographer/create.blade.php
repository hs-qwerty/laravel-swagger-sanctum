@extends('main')

@section('title')
@stop

@section('css')
@stop

@section('content')
    <!-- left column -->
    <div class="col-md-8 offset-2">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Photographer Create Page</h3>
            </div>

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
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('photographer.store') }}">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">link</label>
                        <input type="text" name="link"  class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">location</label>
                        <input type="text" name="location" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
@stop
