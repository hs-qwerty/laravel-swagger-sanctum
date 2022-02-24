@extends('main')

@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">

                <a href="{{ route('photographer.list') }}">
                    <button class="btn btn-primary btn-xs">Photographer</button>
                </a>
            </div>
        </div>
        <div class="card-body">
            Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
@stop


