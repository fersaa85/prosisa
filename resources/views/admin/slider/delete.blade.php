
<p> Seguro que quiere borrar el producto </p>
<p> {!! HTML::image("assets/uploads/slider/$delete") !!}</p>
{!! Form::open(['method' => 'POST']) !!}

{!! Form::submit('Eliminar') !!}
{!! Form::close() !!}