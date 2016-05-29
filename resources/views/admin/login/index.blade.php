@extends('admin.template')
@section('section')

	<div class="container">

		<div class="row">
			
			
			<div class="col-md-5">
			{!! Form::open(['method' 	=> 'POST',
							'name' 		=> 'frmAdmin',
							'files' 	=> true,
							'class' 	=> 'form-horizontal']) !!}
				
			<fieldset>
				<legend>Login administrador</legend>
				@include('admin.login.forms.form')
			</fieldset>
			{!! Form::close() !!}
			</div>
			
		</div>
		
	</div>
@endsection
