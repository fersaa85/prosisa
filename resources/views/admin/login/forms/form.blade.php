	<div class="form-group">
		{!! Form::label('username', 'Usuario', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
		{!! Form::text('username', Input::get('employed_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
	
	
	
	<div class="form-group">
		{!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
		{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
	
	
	<div class="form-group">
		<span class="col-sm-2 control-label"></span>
		<div class="col-sm-10">
		{!! Form::submit('Enviar', ['class' => 'btn btn-info']); !!}
		</div>
	</div>