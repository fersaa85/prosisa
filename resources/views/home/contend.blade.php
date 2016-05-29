@extends('template')
@section('section')

    <div class="container">
        <div class="row">
            <div class="banner">
               {!! HTML::image("assets/uploads/contend/$data->file_image") !!}
            </div>
        </div>
    </div>


    <!-- BOTONES NAVEGACION -->



    <div class="container margin text">
        <div class="row">
            <h5>{!! $data->name !!}</h5>
            {!! $data->description !!}
        </div>
        <div class="row">
            @if( isset($data->catalog) )
            <div class="btn_catalogo">
                <a href="{{ URL::to("$data->catalog") }}"><button class="division_agricola">{{ $languaje["show_catalog"] }}</button></a>
            </div>
            @endif
        </div>
    </div>


@endsection