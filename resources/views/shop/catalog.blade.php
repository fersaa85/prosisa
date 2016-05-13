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

<div class="container" id="noresponsive">
    <div class="row container_menu_products">
        <a href="{{ URL::to('/') }}/tienda/productos/1" /><img src="images/productos_catalogo/granulados.png"></a>
    </div>

    <!--
    <div class="row container_menu_products right">
        <a href="contenido_catalogo_hidrosolubles.html"><img src="images/productos_catalogo/hidrosolubles.png"></a>
    </div>

    <div class="row container_menu_products">
        <a href="contenido_catalogo_foliares.html"><img src="images/productos_catalogo/foliares.png"></a>
    </div>
    <div class="row container_menu_products right">
        <a href="contenido_catalogo_quelatos.html"><img src="images/productos_catalogo/quelatos.png"></a>
    </div>
    -->
</div>


<!-- RESPONSIVE -->

<div class="container" id="responsive">
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
