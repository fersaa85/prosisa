@extends('template')
@section('section')
<div class="container" id="">


    @if($id == 1)
    <div class="row">
        <div class="title_container_menu">
            <p>GRANULADOS {!!  HTML::image('assets/images/icono_formulario.png') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="list_products_catalog marginBottom" style="border-bottom:0px;">

            <table class="margin_table_head" style="width:100%">
                <tr>
                    <td width="25%;" class="bold"> {{ $languaje["product"] }}
                    </td>
                    <td width="55%;" class="bold">
                       {{ $languaje["description"] }}
                    </td>
                    <td width="20%;"  class="cabecera_img_product bold">   {{ $languaje["composition"] }} %p/p</td>
                </tr>
            </table>


            @if( Session::has('success') )
                <p>{{Session::get('success') }}</p>
             @endif

            @foreach($Product as $value)
            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        @if( empty($value->file) )
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">{{ $value->name }}</button>
                        @else
                        <form class="formDirect" method="get" action="{{ URL::to("assets/uploads/product/$value->file") }}" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">{{ $value->name }}</button>
                        </form>
                        @endif
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p>{!! $value->description !!}</p>
                        {!! Form::open(['url'=>'tienda/product', 'method'=>'post']) !!}
                            {!! Form::hidden('product_id', $value->id ) !!}
                        <button class="btn_granulados" type="submit" value="">   {{ $languaje["add_cart"] }}</button>
                        {!! Form::close() !!}
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo bold textBlanco p {{ $value->last }}">
                        @if( $value->composition->isEmpty() )
                            <p style="line-height: normal; text-align: center;">Consulte a nuestro <br /><br />Generador de Negocios</p>
                        @else
                            <table style="width:100%">
                                @foreach($value->composition as $composition)
                                    <tr>
                                        <td width="50%;"><p><span class="{{ $composition->pink }}">{{ $composition->chemical }}</span></p></td><td width="50%;"><p> {{ $composition->porcent }}%</p></td>
                                    </tr>
                                @endforeach
                            </table>
                         @endif

                    </td>
                </tr>
            </table>
            @endforeach


        </div>
    </div>


        <div class="container button_download_catalog" id="">
            <form method="get" action="{{ URL::to("assets/uploads/product/$Catalog->file") }}" target="NEW">
                <button type="submit">{{ $languaje["download_catalog"] }}</button>
            </form>
        </div>



    @elseif($id == 2)

        <div class="row">
            <div class="title_container_menu">
                <p>HIDROSOLUBLE {!!  HTML::image('assets/images/iconoHidrosoluble.png') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="list_products_catalog marginBottom" style="border-bottom:0px;">

                <table class="margin_table_head" style="width:100%">
                    <tr>
                        <td width="25%;" class="bold"> {{ $languaje["product"] }}
                        </td>
                        <td width="55%;" class="bold">
                           {{ $languaje["description"] }}
                        </td>
                        <td width="20%;"  class="cabecera_img_product bold">   {{ $languaje["composition"] }} %p/p</td>
                    </tr>
                </table>


                @if( Session::has('success') )
                    <p>{{Session::get('success') }}</p>
                @endif

                @foreach($Product as $value)
                    <table style="width:100%">
                        <tr>
                            <hr class="cabecera_title_product_hidrosoluble"></hr>
                            <td width="25%;">
                                <p class="cabecera_title_product_p textAmarillo">
                                @if( empty($value->file) )
                                      <button class="buttonFormDirect cabecera_title_product_p textRosa" type="submit">{{ $value->name }}</button>
                                @else
                                    <form class="formDirect" method="get" action="{{ URL::to("assets/uploads/product/$value->file") }}" target="NEW">
                                        <button class="buttonFormDirect cabecera_title_product_p textRosa" type="submit">{{ $value->name }}</button>
                                    </form>
                                @endif
                                </p>
                            </td>
                            <hr class="cabecera_desc_product_hidrosoluble"></hr>
                            <td width="55%;">
                                <p>{!! $value->description !!}</p>
                                {!! Form::open(['url'=>'tienda/product', 'method'=>'post']) !!}
                                {!! Form::hidden('product_id', $value->id ) !!}
                                <button class="btn_hidro" type="submit" value="">   {{ $languaje["add_cart"] }}</button>
                                {!! Form::close() !!}
                            </td>
                            <td width="20%;"  class="cabecera_img_product fondoRosa bold textBlanco p">
                                @if( $value->composition->isEmpty() )
                                    <p style="line-height: normal; text-align: center;">Consulte a nuestro <br /><br />Generador de Negocios</p>
                                @else
                                    <table style="width:100%">
                                        @foreach($value->composition as $composition)
                                            <tr>
                                                <td width="50%;"><p><span class="{{ $composition->pink }}">{{ $composition->chemical }}</span></p></td><td width="50%;"><p> {{ $composition->porcent }}%</p></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </td>
                        </tr>
                    </table>
                @endforeach


            </div>
        </div>



        <div class="container button_download_catalog" id="">
            <form method="get" action="{{ URL::to("assets/uploads/product/$Catalog->file") }}" target="NEW">
                <button type="submit">{{ $languaje["download_catalog"] }}</button>
            </form>
        </div>




    @elseif($id == 5)

        <div class="row">
            <div class="title_container_menu">
                <p>FOLIARES {!!  HTML::image('assets/images/icono_foliares.png') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="list_products_catalog marginBottom" style="border-bottom:0px;">

                <table class="margin_table_head" style="width:100%">
                    <tr>
                        <td width="25%;" class="bold"> {{ $languaje["product"] }}
                        </td>
                        <td width="55%;" class="bold">
                           {{ $languaje["description"] }}
                        </td>
                        <td width="20%;"  class="cabecera_img_product bold">   {{ $languaje["composition"] }} %p/p</td>
                    </tr>
                </table>


                @if( Session::has('success') )
                    <p>{{Session::get('success') }}</p>
                @endif

                @foreach($Product as $value)
                    <table style="width:100%">
                        <tr>
                            <hr class="cabecera_title_product_foliares"></hr>
                            <td width="25%;">
                                <p class="cabecera_title_product_p textAzul">
                                @if( empty($value->file) )
                                    <button class="buttonFormDirect cabecera_title_product_p textAzul" type="submit">{{ $value->name }}</button>
                                @else
                                    <form class="formDirect" method="get" action="{{ URL::to("assets/uploads/product/$value->file") }}" target="NEW">
                                        <button class="buttonFormDirect cabecera_title_product_p textAzul" type="submit">{{ $value->name }}</button>
                                    </form>
                                @endif
                                </p>
                            </td>
                            <hr class="cabecera_desc_product_foliares"></hr>
                            <td width="55%;">
                                <p>{!! $value->description !!}</p>
                                {!! Form::open(['url'=>'tienda/product', 'method'=>'post']) !!}
                                {!! Form::hidden('product_id', $value->id ) !!}
                                <button class="btn_foliares" type="submit" value="">{{ $languaje["add_cart"] }}</button>
                                {!! Form::close() !!}
                            </td>
                            <td width="20%;"  class="cabecera_img_product fondoAzul bold textBlanco p">
                                @if( $value->composition->isEmpty() )
                                    <p style="line-height: normal; text-align: center;">Consulte a nuestro <br /><br />Generador de Negocios</p>
                                @else
                                    <table style="width:100%">
                                        @foreach($value->composition as $composition)
                                            <tr>
                                                <td width="50%;"><p><span class="{{ $composition->pink }}">{{ $composition->chemical }}</span></p></td><td width="50%;"><p> {{ $composition->porcent }}%</p></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </td>
                        </tr>
                    </table>
                @endforeach


            </div>
        </div>


        <div class="container button_download_catalog" id="">
            <form method="get" action="{{ URL::to("assets/uploads/product/$Catalog->file") }}" target="NEW">
                <button type="submit">{{ $languaje["download_catalog"] }}</button>
            </form>
        </div>




    @elseif($id == 6)

        <div class="row">
            <div class="title_container_menu">
                <p>QUELATOS {!!  HTML::image('assets/images/iconoHidrosoluble.png') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="list_products_catalog marginBottom" style="border-bottom:0px;">

                <table class="margin_table_head" style="width:100%">
                    <tr>
                        <td width="25%;" class="bold"> {{ $languaje["product"] }}
                        </td>
                        <td width="55%;" class="bold">
                           {{ $languaje["description"] }}
                        </td>
                        <td width="20%;"  class="cabecera_img_product bold">   {{ $languaje["composition"] }} %p/p</td>
                    </tr>
                </table>


                @if( Session::has('success') )
                    <p>{{Session::get('success') }}</p>
                @endif

                @foreach($Product as $value)
                    <table style="width:100%">
                        <tr>
                            <hr class="cabecera_title_product_hidrosoluble"></hr>
                            <td width="25%;">
                                <p class="cabecera_title_product_p textAmarillo">
                                @if ($value->id == 14)
                                       <img class="logoIndependiente" src="assets/images/btn_ferrostrene.png">
                                       <span class="text_slim">©</span>
                                @elseif( empty($value->file) )
                                    <button class="buttonFormDirect cabecera_title_product_p textRosa" type="submit">{{ $value->name }}</button>
                                @else
                                    <form class="formDirect" method="get" action="{{ URL::to("assets/uploads/product/$value->file") }}" target="NEW">
                                        <button class="buttonFormDirect cabecera_title_product_p textRosa" type="submit">{{ $value->name }}</button>
                                    </form>
                                @endif
                                </p>
                            </td>
                            <hr class="cabecera_desc_product_hidrosoluble"></hr>
                            <td width="55%;">
                                <p>{!! $value->description !!}</p>
                                {!! Form::open(['url'=>'tienda/product', 'method'=>'post']) !!}
                                {!! Form::hidden('product_id', $value->id ) !!}
                                <button class="btn_hidro" type="submit" value="">   {{ $languaje["add_cart"] }}</button>
                                {!! Form::close() !!}
                            </td>
                            <td width="20%;"  class="cabecera_img_product fondoRosa bold textBlanco p">
                                @if( $value->composition->isEmpty() )
                                    <p style="line-height: normal; text-align: center;">Consulte a nuestro <br /><br />Generador de Negocios</p>
                                @else
                                    <table style="width:100%">
                                        @foreach($value->composition as $composition)
                                            <tr>
                                                <td width="50%;"><p><span class="{{ $composition->pink }}">{{ $composition->chemical }}</span></p></td><td width="50%;"><p> {{ $composition->porcent }}%</p></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </td>
                        </tr>
                    </table>
                @endforeach


            </div>
        </div>

        <div class="container button_download_catalog" id="">
            <form method="get" action="{{ URL::to("assets/uploads/product/$Catalog->file") }}" target="NEW">
                <button type="submit">{{ $languaje["download_catalog"] }}</button>
            </form>
        </div>


    @endif

</div>
@endsection