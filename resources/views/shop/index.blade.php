@extends('template')
@section('section')
<div class="container">
    <div class="row">
        <h4 class="title_catalog">{{ $languaje["catalog"] }}</h4>
        <ul class="grid cs-style-7">
            @foreach($data as $value)
            <li>
                <figure>
                   {!! HTML::image("assets/uploads/contend/$value->file_image") !!}
                    <figcaption>
                        <h3>{{ $value->name }}</h3>
                        <a href="{{ $value->catalog }}">{{ $languaje["go_catalog"] }}</a>
                    </figcaption>
                </figure>
            </li>
            @endforeach

        </ul>
    </div>
</div>
@endsection