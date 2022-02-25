@extends('main')

@section('title')
@stop

@section('css')
@stop

@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    <!-- select -->



                    <form  method="get" action="" style="display: flex; justify-content: center; align-items: center">
                    <div class="form-group" style="width: 500px;">
                        <input style="width: 100%" type="text" name="qt">
                    </div>
                    <button class="btn btn-primary btn-xs" style="height: 45px; " >Choise</button>
                    </form>
                </div>

                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Ekko Lightbox</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($photographer as $item)
                                <div class="col-sm-2">
                                    <a href="{{ $item->url }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                        <img src="{{ $item->url }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@stop



@section('js')


@endsection
