

<div class="form-group">
    {!! Form::label('name', 'Nombre de la seccion', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', Input::get('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('description', 'Descripción', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', Input::get('description'), ['class' => 'form-control tinymce', 'placeholder' => '']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('file_image', 'Banner', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::file('file_image', ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('category_id', 'Categoría', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('category_id',  $category_id, Request::input('category_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('', '', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::submit('Guardar') !!}
    </div>
</div>