
    <div class="form-group">
        {!! Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', Input::get('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Imagen', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description',  Input::get('description'), ['class' => 'form-control tinymce', 'placeholder' => '']) !!}
        </div>
    </div>



    <div class="form-group">
        {!! Form::label('price', 'Precio', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('price', Input::get('price'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('catalog_id', 'Catalogo', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('catalog_id',  $catalog_id, Request::input('catalog_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>



    <div class="form-group">
        {!! Form::label('file_image', 'Imagen', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('file_image', ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>




    <div class="form-group">
        {!! Form::label('file_pdf', 'PDF', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('file_pdf', ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('', '', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::submit('Guardar', ['class'=>'btn btn-info']) !!}
        </div>
    </div>