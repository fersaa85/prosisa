@extends('template')
@section('section')
    <div class="container" id="">
        <div class="row">
            <div class="">
                <p>Colaboramos en la generación de negocios y rentabilidad dentro de los siguientes mercados e industrias:<br>
                    •Tratamiento de aguas residuales •Minería •Nutrición pecuaria •Agroindustrias</p>
            </div>
        </div>
        <div class="row">
            <div class="list_products_catalog marginBottom" style="border-bottom:0px;">

                <table class="margin_table_head"  style="width:100%">
                    <tr>
                        <td width="30%;" class="bold"> {{ $languaje["product"] }}
                        </td>
                        <td width="60%;" class="bold">

                        </td>
                        <td width="20%;"  class="cabecera_img_product bold"></td>
                    </tr>
                </table>


                @if( Session::has('success') )
                    <p>{{Session::get('success') }}</p>
                @endif

                @foreach($Product as $value)
                <table style="width:100%">
                    <tr>
                        <hr class="cabecera_title_ultimos_catalogos"></hr>
                        <td width="20%;">
                            <p class="cabecera_title_product_p">
                                <button class="buttonFormDirect cabecera_title_product_p" type="submit">{{ $value->name }}</button>
                            </p>
                        </td>
                        <hr class="cabecera_desc_ultimos_catalogos"></hr>
                        <td width="60%;">
                            <p>
                                {!! $value->description !!}
                            </p>
                        </td>
                        <td width="20%;"  class="">
                            {!! Form::open(['url'=>'tienda/product', 'method'=>'post']) !!}
                            {!! Form::hidden('product_id', $value->id ) !!}
                            <button class="btn_segundo" type="submit">{{ $languaje["add_cart"] }}</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </table>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container button_download_catalog" id="">
        <form method="get" action="{{ URL::to("assets/uploads/product/$Catalog->file") }}" target="NEW">
            <button type="submit">{{ $languaje["download_catalog"] }}</button>
        </form>
    </div>


@endsection