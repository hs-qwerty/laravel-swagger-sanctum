@extends('main')

@section('title')
@stop

@section('css')
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Photographer List</h3>
            <a href="{{ route('photographer.create') }}">
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

                @foreach($photographer as $item)
                <tr>
                    <td>1.</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->location }}</td>
                    <td style="display: flex;">
                        <a href="{{ route('photographer.edit', $item->id) }}">
                            <button class="btn btn-primary btn-xs mr-3">Edit</button>
                        </a>


                        <form id="photographerDestroy" method="post" action="{{ route('photographer.destroy',$item->id) }}">
                            @csrf
                            @method('delete')
                            <button href="#" class="btn btn-danger btn-xs" onclick="document.getElementById('photographerDestroy').submit();" >Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
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
