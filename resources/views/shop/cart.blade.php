<!DOCTYPE html>
<html lang="es">
<head>
    <base href="{{ URL::to('/') }}/assets/" />
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


    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container margin">
    <div class="row">
        <div class="idioma two columns">
            <button><img src="images/esp_mexico.png"></button>
            <button><img src="images/eng.png"></button>
        </div>
    </div>
    <div class="row">
        <header>

            <div class="four columns logo">
                <a href="index.html"><img src="images/logo_new.png"></a>
            </div>

            <div class="eight columns">
                <div class="menu mayusculas">
                    <nav>
                        <ul>
                            <li><a href="index.html">Inicio</a></li>
                            <li><a href="menu_catalogo.html">Catálogo</a></li>
                            <li><a href="contacto.html">Contacto</a></li>
                            <li><a href="carrito.html"><img src="images/carrito.png"></a></li>
                        </ul>
                    </nav>
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
                    <li><a href="index.html">Inicio</a></li><hr>
                    <li><a href="menu_catalogo.html">Catálogo</a></li><hr>
                    <li><a href="contacto.html">Contacto</a></li><hr>
                    <li><a href="carrito.html"><img src="images/carrito.png"></a></li><hr>
                </ul>
            </nav>
        </div>
    </div>
</div>
<hr></hr>


<!-- BOTONES NAVEGACION -->
<div class="container">
    <div class="row">
        <div class="tituloCarrito">
            <h4>Tus compras: </h4>
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
                    <td><img src="images/productos_carrito/icono1.png"></td>
                    <td>{{ $value->description }}</td>
                    <td>${{ $value->subtotal }}
                        {!! Form::open(['url' => 'tienda/product', 'method' => 'delete']) !!}
                            {!! Form::hidden('product_id', $value->id ) !!}
                            {!! Form::submit('Emilinar') !!}
                        {!! Form::close() !!}


                        {!! Form::open(['url' => 'tienda/product', 'method' => 'put']) !!}
                            {!! Form::hidden('product_id', $value->id ) !!}
                            {!! Form::text('quantity', $value->quantity, [])!!}
                            {!! Form::submit('Enviar') !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
                <!--
                <tr>
                    <td>PROSILbrix L</td>
                    <td><img src="images/productos_carrito/icono2.png"></td>
                    <td>Solución Potásica Nk</td>
                    <td>$450.00</td>
                </tr>
                <tr>
                    <td>PROactil</td>
                    <td><img src="images/productos_carrito/icono3.png"></td>
                    <td>Activador orgánica de alta eficiencia Ácidos falcives de alta concentracion</td>
                    <td>$320.00</td>
                </tr>
                <tr>
                    <td>PROactil Cuatro</td>
                    <td><img src="images/productos_carrito/icono4.png"></td>
                    <td>Activador orgánica de alta eficiencia</td>
                    <td>$200.00</td>
                </tr>
                -->
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
                    <input type="hidden" name="cbt" value="Presione aqui para volver a www.nuestrositio.com >>">
                    <input type="hidden" name="cmd" value="_xclick">
                    <!--Es el método con que Paypal devolverá las variables a la página ipn_success.php (1 es get 2 es post).-->
                    <input type="hidden" name="rm" value="2">
                    <input type="hidden" name="bn" value="Prosisa">
                    <!--Es el mail que el vendedor registró en su cuenta de Paypal-->
                    <input type="hidden" name="business" value="fersaavedra85-buyer-1@hotmail.com">
                    <!--Es el detalle de lo que estamos vendiendo-->
                    <input type="hidden" name="item_name" value="PRODUCTO PRUEBA PROfer G-14">
                    <input type="hidden" name="item_number" value="Nombre del comprador">
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

                    <input type="submit" name="Submit" value="Cheackout">
                </fieldset>
            </form>


        </div>
    </div>
</div>


<hr></hr>
<!-- FOOTER -->

<div class="container margin">
    <div class="row">
        <footer>
            <img src="images/logo_industrial.png">
        </footer>
    </div>
</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<!--<script type="text/javascript" src="js/jquery.js"></script>-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
</body>
</html>
