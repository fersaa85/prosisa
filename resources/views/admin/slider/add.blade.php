@extends('admin.template')

@section('section')


    <div class="col-md-5 pull-left">
        {!! Form::open(['method' 	=> 'POST',
                        'name' 		=> 'frmAdd',
                        'files' 	=> true,
                        'class' 	=> 'form-horizontal']) !!}


        <fieldset>
            <legend>Nuevo  Producto:</legend>
            @include('admin.slider.form.slider')
        </fieldset>

        {!! Form::close() !!}
    </div>

@stop