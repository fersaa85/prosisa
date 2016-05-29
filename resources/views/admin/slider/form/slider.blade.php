
<div class="form-group">
    {!! Form::label('file_image', 'Slider', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::file('file_image', ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('texts', 'Texto del slider', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('texts', Input::get('texts'), ['class' => 'form-control', 'placeholder' => '']) !!}
        <span>Separe los textos con comas</span>
    </div>
</div>


<div class="form-group">
    {!! Form::label('contend_id', 'Categoria', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('contend_id',  $contend_id, Request::input('contend_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('', '', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::submit('Guardar') !!}
    </div>
</div>