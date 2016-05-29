@extends('template')
@section('section')
<!-- SLIDER -->
<div class="row">
    <div id="slider" style="min-width:100% !important;">
        <ul class="bjqs">
            @foreach($data as $value)

                @if( $value->slider_type == "singler" )
                <li>
                   {!! HTML::image("assets/uploads/slider/$value->file_image", $value->texts[0]->text, ['title'=>$value->texts[0]->text ]) !!}
                </li>

                @elseif( $value->slider_type == "multiple" )
                    <li>
                        {!! HTML::image("assets/uploads/slider/$value->file_image", '', []) !!}
                        @foreach( $value->texts as $text )
                        <p class="animated bounceIn {{ strtolower( $text->text ) }}">"{{ $text->text }}"</p>
                        @endforeach
                    </li>

                @endif
            @endforeach
        </ul>
    </div>
</div>
<!-- BOTONES NAVEGACION -->

<div class="container margin mapImages">
    <div class="row">
        <div class="containerButtons">
            <div class="botonera">
                <img id="image_jitomates" class="btnUno" src="{!! URL::to('assets/images/jitomates.png') !!}" usemap="#Map1">
                <map class="mapCerdo" name="Map1" id="Map1">
                    <area  shape="poly" coords="105,16,12,70,12,180,110,235,210,180,210,65,116,14" alt="Jitomate" title="Jitomate" href="{{ URL::to('division-agricola') }}" />
                </map>
            </div>
            <div class="botonera">
                <img id="image_cerdo" alt="puerco" usemap="#Map2" class="btnDos" src="{!! URL::to('assets/images/boton_puerco.png') !!}" hidefocus="true">
                <map class="mapCerdo" name="Map2" id="Map2">
                    <area  shape="poly" coords="105,16,12,70,12,180,110,235,210,180,210,65,116,14" alt="Cerdo" title="Cerdo" href="{{ URL::to('division-industrial') }}" />
                </map>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="four columns exceptionResponsive exceptionLeft exceptionTop botoneraSegundaParte">
            <img id="image_agua"  class="btnDosUno 2daImagen" src="{!! URL::to('assets/images/btn_agua.png') !!}" usemap="#Map3">
            <map class="mapCerdo" name="Map3" id="Map3">
                <area  shape="poly" coords="105,16,12,70,12,180,110,235,210,180,210,65,116,14" alt="Agua" title="Agua" href="{{ URL::to('division-tratamiento') }}" />
            </map>
        </div>
        <div  class="four columns  exceptionTop exception botoneraSegundaParte">
            <img id="image_elote"  src="{!! URL::to('assets/images/boton_elotes.png') !!}" usemap="#Map4">
            <map class="mapCerdo" name="Map4" id="Map4">
                <area  shape="poly" coords="105,16,12,70,12,180,110,235,210,180,210,65,116,14" alt="Elote" title="Elote" href="{{ URL::to('tienda/catalogo') }}" />
            </map>

        </div>
        <div class="four columns exceptionResponsive exceptionTop botoneraSegundaParte">
            <img id="image_maquina"   class="btnDosTres" src="{!! URL::to('assets/images/boton_quienessomos.png') !!}" usemap="#Map5">
            <map class="mapCerdo" name="Map5" id="Map5">
                <area  shape="poly" coords="105,16,12,70,12,180,110,235,210,180,210,65,116,14" alt="Maquina" title="Maquina" href="{{ URL::to('quienes-somos') }}" />
            </map>
        </div>
    </div>
</div>
@endsection