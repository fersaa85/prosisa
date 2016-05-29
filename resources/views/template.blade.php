<!DOCTYPE html>
<html lang="es">
<head>

    <!--Created by karma -->

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Prosisa</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{!! $viewshare["site_domine"] !!}" />

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    {!! HTML::style('assets/css/normalize.css') !!}
    {!! HTML::style('assets/css/skeleton.css') !!}
    {!! HTML::style('assets/css/style.css') !!}
    {!! HTML::style('assets/css/component.css') !!}
    {!! HTML::style('assets/css/animate.css') !!}


</head>
<body>

<!-- Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container margin">
    <div class="row">
        <div class="idioma two columns">
            <a href="{{ URL::to('idioma/espanol') }}">{!! HTML::image("assets/images/esp_mexico.png") !!}</a>
            <a href="{{ URL::to('idioma/english') }}">{!! HTML::image("assets/images/eng.png") !!}</a>
        </div>
    </div>
    <div class="row">
        <header>
            <div class="four columns logo">
                <a href="{{ URL::to("/") }}">{!! HTML::image("assets/images/logo_new.png") !!}</a>
            </div>

            <div class="eight columns">
                <div class="menu mayusculas">
                    <nav>
                        <ul>
                            <li><a href="{{ URL::to("/") }}">{{ $languaje["home"] }}</a></li>
                            <li><a href='{{ URL::to("tienda") }}'>{{ $languaje["catalog"] }}</a></li>
                            @if( $submenu )
                                <li><button id="show">{{ $section }}</button></li>
                            @endif
                            <li><a href="{{ URL::to('contacto') }}">{{ $languaje["contact"] }}</a></li>
                            <li><a href="{{ URL::to("tienda/carrito") }}">{!! HTML::image("assets/images/carrito.png") !!}</a></li>
                        </ul>
                    </nav>
                    @if( $submenu )
                    <div id="dropdown" class="dropdown">

                        <a href="{{ URL::to('division-agricola') }}">{{ $submenu[0]->name }}</a><br><hr></hr>
                        <a href="{{ URL::to('division-industrial') }}">{{ $submenu[1]->name }}</a><br><hr></hr>
                        <a href="{{ URL::to('division-tratamiento') }}">{{ $submenu[2]->name }}</a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="menuHamburguesa">
                <button class="botonMenuHamburguesa" id="botonHamburguesa"></button>
            </div>
        </header>
    </div>
</div>


<!-- MENU RESPONSIVE-->

<div class="container" id="menuResponsive">
    <div class="container">
        <div class="menuResponsive mayusculas">
            <nav>
                <ul>
                    <hr>
                    <li><a href="{{ URL::to("/") }}">{{ $languaje["home"] }}</a></li>
                    <li><a href='{{ URL::to("tienda") }}'>{{ $languaje["catalog"] }}</a></li>
                    <li><a href="{{ URL::to('contacto') }}">{{ $languaje["contact"] }}</a></li>
                    <li><a href="{{ URL::to('tienda/carrito') }}"><img src="images/carrito.png"></a></li><hr>
                </ul>
            </nav>
        </div>
    </div>
</div>


@yield('section')


<hr />

<!-- FOOTER -->

<div class="container margin">
    <div class="row">
        <footer>
            {!! HTML::image('assets/images/logo_industrial.png') !!}
        </footer>
    </div>
</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

{!! HTML::script('assets/js/modernizr.custom.js') !!}
{!! HTML::script('assets/js/toucheffects.js') !!}
{!! HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
{!! HTML::script('assets/js/funciones.js') !!}
{!! HTML::script('assets/js/script.js') !!}
{!! HTML::script('assets/js/slider.min.js') !!}
{!! HTML::script('assets/js/jquery.rwdImageMaps.min.js') !!}
{!! HTML::script('assets/js/jquery.rwdImageMaps.js') !!}


<script>
    $(document).ready(function(){
        $("p:nth-child(3)").css("color", "black");
    });
</script>
</body>
</html>
