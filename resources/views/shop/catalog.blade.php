@extends('template')
@section('section')
    <div class="container" id="noresponsive">
        <div class="row container_menu_products">
            <a href="{{ URL::to('tienda/productos/1') }}" />{!! HTML::image('assets/images/productos_catalogo/granulados.png') !!}</a>
        </div>


        <div class="row container_menu_products right">
            <a href="{{ URL::to('tienda/productos/2') }}">{!! HTML::image('assets/images/productos_catalogo/hidrosolubles.png') !!}</a>
        </div>

        <div class="row container_menu_products">
            <a href="{{ URL::to('tienda/productos/5') }}">{!! HTML::image('assets/images/productos_catalogo/foliares.png') !!}</a>
        </div>
        <div class="row container_menu_products right">
            <a href="{{ URL::to('tienda/productos/6') }}">{!! HTML::image('assets/images/productos_catalogo/quelatos.png') !!}</a>
        </div>
    </div>

@endsection