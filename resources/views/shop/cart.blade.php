@extends('template')
@section('section')
<!-- BOTONES NAVEGACION -->
<div class="container">
    <div class="row">
        <div class="tituloCarrito">
            <h4>{{ $languaje["your_shopping"] }}: </h4>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="list_products">
            <table style="width:100%">
                @foreach($products as $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{!! HTML::image("assets/images/productos_carrito/$value->file_image") !!}</td>
                    <td>{!!  $value->description !!}</td>
                    <td>${{ $value->subtotal }}
                        <!--
                        {!! Form::open(['url' => 'tienda/product', 'method' => 'delete']) !!}
                            {!! Form::hidden('product_id', $value->id ) !!}
                            {!! Form::submit( "{$languaje["btn_delete"]}", ['class'=>'btn-pink'] ) !!}
                        {!! Form::close() !!}


                        {!! Form::open(['url' => 'tienda/product', 'method' => 'put']) !!}
                            {!! Form::hidden('product_id', $value->id ) !!}
                            {!! Form::text('quantity', $value->quantity, [])!!}
                            {!! Form::submit("{$languaje["btn_submit"]}", ['class'=>'btn-pink'] ) !!}
                        {!! Form::close() !!}
                        -->
                    </td>
                </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total: ${{ $_getCartTotal['total'] }}</td>
                </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> </td>
                    </tr>
            </table>
            <!-- Creamos el formulario para enviar a Paypal -->
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="f1" id="f1" method="post">
                <fieldset>


                    <!--Es el costo de envío.-->
                    <input type="hidden" name="shipping" value="0">
                    <!--Es el mensaje que verá en Paypal el usuario al finalizar el proceso de pago.-->
                    <input type="hidden" name="cbt" value="Presione aqui para volver a www.prosisa.com >>">
                    <input type="hidden" name="cmd" value="_xclick">
                    <!--Es el método con que Paypal devolverá las variables a la página ipn_success.php (1 es get 2 es post).-->
                    <input type="hidden" name="rm" value="2">
                    <input type="hidden" name="bn" value="Prosisa">
                    <!--Es el mail que el vendedor registró en su cuenta de Paypal-->
                    <input type="hidden" name="business" value="{{ $paypal }}">
                    <!--Es el detalle de lo que estamos vendiendo-->
                    <input type="hidden" name="item_name" value="{{ $allproducts }}">
                    <input type="hidden" name="item_number" value="Comprador">
                    <!--Es el importe total de la operación.-->
                    <input type="hidden" name="amount" value="{{ $_getCartTotal['total'] }}">
                    <!--Aquí podemos colocar cualquier variable que luego necesitemos para realizar nuestros procesos cuando Paypal redireccione al usuario a nuestra página de éxito. -->
                    <input type="hidden" name="custom" value="{{ $_getCartTotal['total']}}">
                    <!--La moneda en que expresamos los valores:USD,GBP,JPY,CAD,EUR.-->
                    <input type="hidden" name="currency_code" value="MXN">
                    <!--Es la ruta absoluta de la imagen que aparecerá en la cabecera de la página de Paypal cuando el comprador esté pagando. Se utiliza para que no perdamos del todo la identidad de nuestro site durante el proceso de pago, pero a menos que la imagen esté guardada en un servidor con protocolo HTTPS, es mejor dejar este campo en blanco ya que, si no lo hacemos de esa manera, cuando el comprador ingrese a Paypal le aparecerá un mensaje diciéndole que la página contiene elementos seguros y no seguros, cosa que puede asustar a algunos compradores. -->
                    <input type="hidden" name="image_url" value="">
                    <!--Aquí colocaremos la ruta absoluta a la página ipn_success.php. Es la página a la que Paypal redirecciona al comprador si el pago se realiza correctamente, y a la que envía las variables que utilizaremos para los procesos ligados a la compra: generar un envío de productos, enviar un mail, descontar del stock, cambiar un nivel de acceso, etc. -->
                    <input type="hidden" name="return" value="{{ URL::to('/') }}/tienda/success">
                    <!--En ella deberemos colocar un mensaje del tipo "Ocurrió un error y la operación no puedo realizarse..." para notificar el fallo al comprador. -->
                    <input type="hidden" name="cancel_return" value="{{ URL::to('/') }}/tienda/error">
                    <!--0=> Hacer que la dirección de envio sea “opcional“;  1=>Hacer que la dirección de envio “no se requiera“; 2=> Hacer que la dirección de envio sea “obligatoria“;-->
                    <input type="hidden" name="no_shipping" value="0">
                    <input type="hidden" name="no_note" value="0">
                    <!-- Mostramos el detalle de la compra -->

                    <input type="submit" name="Submit" class="division_agricola" value="Cheackout">
                </fieldset>
            </form>


        </div>
    </div>
</div>
@endsection