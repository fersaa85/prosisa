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
                            <li><button id="show">Granulados</button></li>
                            <li><a href="contacto.html">Contacto</a></li>
                            <li><a href="{{ URL::to('/') }}/tienda/carrito"><img src="images/carrito.png"></a></li>
                        </ul>
                    </nav>
                    <div id="dropdown" class="dropdown">
                        <a href="catalogo_nutricion_vegetal.html">env</a><br><hr></hr>
                        <a style="font-size:0.8em;float:right;"  href="contenido_catalogo_nutricion_vegetal.html">Granulados</a><br><hr></hr>
                        <a style="font-size:0.8em;float:right;"  href="contenido_catalogo_hidrosolubles.html">Hidrosolubles</a><br><hr></hr>
                        <a style="font-size:0.8em;float:right;" href="contenido_catalogo_foliares.html">Foliares</a><br><hr></hr>
                        <a style="font-size:0.8em;float:right;" href="contenido_catalogo_quelatos.html">Quelatos</a><br><hr></hr>
                        <a href="contenido_catalogo_industrial.html">Division Industrial</a><br><hr></hr>
                        <a href="contenido_catalogo_agua.html">Tratamiento de agua</a>
                    </div>
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
                    <li><a href="menu_catalogo.html">env</a></li><hr>
                    <li><a style="font-size:0.8em;float:right;"  href="contenido_catalogo_nutricion_vegetal.html">Granulados</a></li><br><hr>
                    <li><a style="font-size:0.8em;float:right;"  href="contenido_catalogo_hidrosolubles.html">Hidrosolubles</a></li><br><hr>
                    <li><a style="font-size:0.8em;float:right;" href="contenido_catalogo_foliares.html">Foliares</a></li><br><hr>
                    <li><a style="font-size:0.8em;float:right;" href="contenido_catalogo_quelatos.html">Quelatos</a></li><br><hr>
                    <li><a href="contenido_catalogo_industrial.html">Division Industrial</a></li><hr>
                    <li><a href="contenido_catalogo_agua.html">Tratamiento de agua</a></li><hr>
                    <li><a href="contacto.html">Contacto</a></li><hr>
                    <li><a href="{{ URL::to('/') }}/tienda/carrito"><img src="images/carrito.png"></a></li><hr>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- BOTONES NAVEGACION -->

<div class="container" id="">
    <div class="row">
        <div class="title_container_menu">
            <p>GRANULADOS <img src="images/icono_formulario.png"></p>
        </div>
    </div>
    <div class="row">
        <div class="list_products_catalog marginBottom" style="border-bottom:0px;">

            <table class="margin_table_head" style="width:100%">
                <tr>
                    <td width="25%;" class="bold"> PRODUCTO
                    </td>
                    <td width="55%;" class="bold">
                        DESCRIPCIÓN
                    </td>
                    <td width="20%;"  class="cabecera_img_product bold">COMPOSICIÓN %p/p</td>
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
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-PROfer G-14-019.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">{{ $value->name }}</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p>{!! $value->description !!}</p>
                        {!! Form::open(['url'=>'tienda/product', 'method'=>'post']) !!}
                            {!! Form::hidden('product_id', $value->id ) !!}
                        <button class="btn_granulados" type="submit" value="">Agregar a tu compra</button>
                        {!! Form::close() !!}
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo bold textBlanco p">
                        <table style="width:100%">
                            @foreach($value->composition as $composition)
                                <tr>
                                    <td width="50%;"><p><span class="{{ $composition->pink }}">{{ $composition->chemical }}</span></p></td><td width="50%;"><p> {{ $composition->porcent }}%</p></td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
            @endforeach

                <!--
            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-PROzinc G-026.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">PROzinc G</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >Zinc granulado, sulfatado, por ende soluble, con vocación agrícola gracias a <span class="textRosa bold">PROactil</span>, para cultivos de alta demanda en zinc.</p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo textBlanco bold p">
                        <table style="width:100%">
                            <tr>
                                <td width="50%;"><p>Zinc</p></td><td width="50%;"><p> 22%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>SO4</p></td><td width="50%;"><p> 20%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p><span class="textRosa">PROactil</span></p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-PROulman G-024.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">PROsulman G</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >Fuente de manganeso de alta solubilidad por su composición en base a sulfatos, y de rápida asimilación por el acompañamiento de <span class="textRosa bold">PROactil.</span></p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo textBlanco bold p">
                        <table style="width:100%">
                            <tr>
                                <td width="50%;"><p>Mn</p></td><td width="50%;"><p> 20%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>SO4</p></td><td width="50%;"><p> 34%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p><span class="textRosa">PROactil</span></p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-PROSIbor G-10-018.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">PROSIbor G-10</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >Previene y corrige, los requerimientos y deficiencias de boro.</p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo textBlanco bold p">
                        <table style="width:100%">
                            <tr>
                                <td width="50%;"><p>B</p></td><td width="50%;"><p> 10%</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-PROSImag G-020.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">PROSImag G</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >Alta concentración de magnesio de fácil solubilidad por su composición en base a sulfatos.</p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo textBlanco bold p">
                        <table style="width:100%">
                            <tr>
                                <td width="50%;"><p>MgO</p></td><td width="50%;"><p> 25%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>SO4</p></td><td width="50%;"><p> 48%</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-PROSImicros 484-021.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">PROSImicros 484</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >Balance de micronutrientes para mejores resultados en suelos neutros o alcalinos, por su concentración y su costo.</p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo textBlanco bold p">
                        <table style="width:100%">
                            <tr>
                                <td width="50%;"><p>FeO</p></td><td width="50%;"><p> 8%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>ZnO</p></td><td width="50%;"><p> 4%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>MnO</p></td><td width="50%;"><p> 1%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>B2O3</p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>MgO</p></td><td width="50%;"><p> 4%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>SO4</p></td><td width="50%;"><p> 13%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>CaO</p></td><td width="50%;"><p> 3%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p><span class="textRosa">PROactil</span></p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-PROSImicros 515-022.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">PROSImicros 515</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >Balance de micronutrientes diseñado para óptimo desempeño en suelos ácidos, también por su concentración y costo.</p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo textBlanco bold p">
                        <table style="width:100%">
                            <tr>
                                <td width="50%;"><p>FeO</p></td><td width="50%;"><p> 1%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>ZnO</p></td><td width="50%;"><p> 5%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>MnO</p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>B2O3</p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>MgO</p></td><td width="50%;"><p> 5%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>SO4</p></td><td width="50%;"><p> 20%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>CaO</p></td><td width="50%;"><p> 3%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p><span class="textRosa">PROactil</span></p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-PROSImicros Z-37-025.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">PROSImicros Z-37</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >Sulfato de zinc acompañado de hierro y magnesio, todo soluble por ser sulfatados, y de alta asimilación gracias a <span class="bold textRosa">PROactil;</span> la mejor relación costo beneficio.</p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo textBlanco bold p">
                        <table style="width:100%">
                            <tr>
                                <td width="50%;"><p>ZnSO4</p></td><td width="50%;"><p> 36.6%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>Fe</p></td><td width="50%;"><p> 5%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>MgO</p></td><td width="50%;"><p> 3%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>SO4</p></td><td width="50%;"><p> 22%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p><span class="textRosa">PROactil</span></p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                        <form class="formDirect" method="get" action="granulados_pdf/FT-15-Zibor-023.pdf" target="NEW">
                            <button class="buttonFormDirect cabecera_title_product_p textAmarillo" type="submit">ZiBor G</button>
                        </form>
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >Proporción óptima entre zinc y boro, para crecimiento y floración; los 2 elementos de mayor demanda en la actualidad, juntos.</p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarillo textBlanco bold p">
                        <table style="width:100%">
                            <tr>
                                <td width="50%;"><p>Zn</p></td><td width="50%;"><p> 12%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p>B</p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                            <tr>
                                <td width="50%;"><p><span class="textRosa">PROactil</span></p></td><td width="50%;"><p> 2%</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <hr class="cabecera_title_product"></hr>
                    <td width="25%;">
                        <p class="cabecera_title_product_p textAmarillo">
                            PROSImicros FEM G
                        </p>
                    </td>
                    <hr class="cabecera_desc_product"></hr>
                    <td width="55%;">
                        <p >
                            Balance de micronutrientes a la medida del cultivo.</p>
                        <button class="btn_granulados" type="submit">Agregar a tu compra</button>
                    </td>
                    <td width="20%;"  class="cabecera_img_product fondoAmarilloImagen textBlanco bold textCentro paddingSoloText">
                        <p>Consulte a nuestro Generador de Negocios</p>
                    </td>
                </tr>
            </table>
            <!--
            <table style="width:100%">
              <tr>
                <td width="20%;">
                  <p class="cabecera_title_product_p bold center">PRODUCTO</p>
                </td>
                <td width="60%;" class="bold">
                  <p >DESCRIPCIÓN</p>
                </td>
                <td width="20%;"class="cabecera_img_product bold center"><p >COMPOSICION %p/p</p></td>
              </tr>
              <tr>
                <td width="20%;">
                  <p class="cabecera_title_product_p textAmarillo">ROfer G-14</p>
                </td>
                <td width="60%;">
                  <p >
                  Las capacidades de Grhbashbashjdbajhsdb ajhsdbajhsbdjhasbdhjabsdjh jasdknnkas.</p>
                </td>
                <td width="20%;"  class="cabecera_img_product"><img src="images/productos_carrito/icono1.png"></td>
              </tr>
              <tr>
                <td width="20%;">
                  <p class="cabecera_title_product_p">ROfer G-14</p>
                </td>
                <td width="60%;">
                  <p >
                  Las capacidades de Grhbashbashjdbajhsdb ajhsdbajhsbdjhasbdhjabsdjh jasdknnkas.</p>
                </td>
                <td width="20%;"  class="cabecera_img_product"><img src="images/productos_carrito/icono1.png"></td>
              </tr>
              <tr>
                <td width="20%;">
                  <p class="cabecera_title_product_p">ROfer G-14</p>
                </td>
                <td width="60%;">
                  <p >
                  Las capacidades de Grhbashbashjdbajhsdb ajhsdbajhsbdjhasbdhjabsdjh jasdknnkas.</p>
                </td>
                <td width="20%;"  class="cabecera_img_product"><img src="images/productos_carrito/icono1.png"></td>
              </tr>

            </table>-->
        </div>
    </div>
</div>


<!-- RESPONSIVE -->

<div class="container button_download_catalog" id="">
    <form method="get" action="pdf/granulados.pdf" target="NEW">
        <button type="submit">DESCARGAR EL CATALOGO</button>
    </form>
</div>


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
<script>
    $(document).ready(function(){
        $("#show").click(function(){
            if($('#dropdown').is(":visible") ){
                $('#dropdown').hide("slow");
            }else{
                $('#dropdown').show("slow");
            }
        });
    });
</script>
</body>
</html>
