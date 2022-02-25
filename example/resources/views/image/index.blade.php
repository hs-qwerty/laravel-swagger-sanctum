@extends('main')

@section('title')
@stop

@section('css')
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Unsplash List</h3>
            <a href="{{ route('image.create') }}">
                <button style="float: right" class="btn btn-primary btn-xs">Photographer Add</button>
            </a>
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
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Task</th>
                    <th>Progress</th>
                    <th>---</th>
                    <th style="width: 40px">Label</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
@stop

@section('js')
@stop
