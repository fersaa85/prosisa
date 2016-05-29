
<p> Seguro que quiere borrar el producto {{ $delete }} </p>
{!! Form::open(['method' => 'POST']) !!}

{!! Form::submit('Eliminar') !!}
{!! Form::close() !!}