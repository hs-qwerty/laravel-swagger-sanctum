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
            <form method="post" action="{{ route('imageconnection.index') }}">
                @csrf
                @method('POST')
                <div class="card-body">


                    <div class="form-group">
                        <label>Photographer Name</label>
                        <select name="photographerId" class="custom-select">
                            @foreach($protographer as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputEmail1">Key value: </label>
                        <input type="text" name="key_value" class="form-control" id="exampleInputEmail1" placeholder="Key value">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Page </label>
                        <input type="text" name="page" class="form-control" id="exampleInputPassword1" placeholder="page">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Per Page </label>
                        <input type="text" name="per_page" class="form-control" id="exampleInputPassword1" placeholder="Per Page">
                    </div>

                    <div class="form-group">
                        <label>Urls</label>
                        <select name="urls" class="custom-select">
                            <option value="raw">raw</option>
                            <option value="full">full</option>
                            <option value="regular">regular</option>
                            <option value="small">small</option>
                            <option value="thumb">thumb</option>
                        </select>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
@stop
