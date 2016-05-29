	@if( $errors->any() )
		<div class="container alert alert-danger" role="alert">
			<ul>
			@foreach($errors->all() as $value)
				<li>{{ $value }}</li>
			@endforeach
			</ul>
		</div>
	@endif
	
		
	@if( Session::has('success') )
		<div class="container alert alert-success" role="alert">
			<p>{{ Session::get('success') }}</p>
		</div>
	@endif

	@if( Session::has('error') )
		<div class="container alert alert-danger" role="alert">
			<p>{{ Session::get('error') }}</p>
		</div>
	@endif


	<!-- alert javascript -->
	<div class="alert alert-success alert-js hidden" role="alert">
		<p class="text-center"></p>
	</div>