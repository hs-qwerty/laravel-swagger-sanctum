@extends('main')

@section('title')
@stop

@section('css')
@stop

@section('content')

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
            <form method="post" action="{{ route('photographer.update',$photographer->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $photographer->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">link</label>
                        <input type="text" name="link"  class="form-control" id="exampleInputPassword1" value="{{ $photographer->link }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">location</label>
                        <input type="text" name="location" class="form-control" id="exampleInputPassword1" value="{{ $photographer->location }}">
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
