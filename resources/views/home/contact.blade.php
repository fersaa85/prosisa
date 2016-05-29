@extends('template')
@section('section')


<div class="container">

    @if( Session::has('succcess') )
        <p>{{ Session::get('succcess') }}</p>
    @endif


    <form method="POST">
        <div class="row">
            <div class="tituloFormulario"><h2>{{ $languaje["contact_1"] }}</h2>
                <p>{{ $languaje["contact_2"] }}</p>
            </div>
            <label class="tituloInput" for="exampleMessage">{{ $languaje["contact_3"] }}</label>
            <input class="email textInput" type="email" placeholder="{{ $languaje["contact_3"] }}" name="email" id="exampleEmailInput" required>
            @if( $errors->has('email') )<span><br/>El email es requerido</span>@endif
        </div>
        <label class="tituloInput" for="exampleMessage">{{ $languaje["contact_4"] }}</label>
        <textarea class="u-full-width textInput" id="exampleMessage" name="message" required></textarea><br>
        @if( $errors->has('message') )<span><br/>EL mensaje es requerido</span><br />@endif
        <input class="submitForm" type="submit" id="exampleEmailInput" value="{{ $languaje["btn_submit"] }}">
    </form>
</div>
<hr />
<div class="container directorio">
    <div class="row">
        <div class="title_directorio textRojo">
            <h6>{{ $languaje["directory"] }}</h6>
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <p class="textBold">Irapuato, Guanajuato</p>
            <p>Av. San Miguel de Allende<br>
                & Salamanca <br>
                Cd. Industrial <br>
                C.P. 36541<br>
                Irapuato Guanajuato<br>
                Tel: +52(462) 622 5058<br>
                ventas@prosipvs.com</p>
        </div>

        <div class="four columns">
            <p class="textBold">España</p>
            <p>Calle General Sueiro No.4 - 5o. C.<br>
                Zaragoza, España <br>
                C.P. 50008<br>
                Tel.+34(902)734 472 <br>
                comercialeur@prosisa.com</p>
        </div>

        <div class="four columns">
            <p class="textBold">Querétaro</p>
            <p>Carranza No. 37 <br>
                Centro<br>
                C.P. 76000<br>
                Querétaro, Querétaro<br>
                Tel. (442) 212 04 73<br>
                contacto@prosisa.com</p>

        </div>
    </div>
</div>

<div class="container mapa">
    <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59725.12805797448!2d-101.35478905770928!3d20.676880364295318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1464222391006" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>

@endsection