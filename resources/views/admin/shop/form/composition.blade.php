
<div class="form-group">
    {!! Form::label('chemical', 'Quimico', ['class' => 'control-label']) !!}
        {!! Form::text('chemical', Input::get('chemical'), ['class' => 'form-control', 'placeholder' => '']) !!}
</div>


<div class="form-group">
    {!! Form::label('porcent', 'Porcentaje', ['class' => 'control-label']) !!}
        {!! Form::text('porcent', Input::get('porcent'), ['class' => 'form-control', 'placeholder' => '']) !!}
</div>

<div class="form-group">
    {!! Form::label('', '', ['class' => 'col-sm-2 control-label']) !!}
    {!! Form::submit('Guardar', ['class' => 'btn btn-info']) !!}
</div>