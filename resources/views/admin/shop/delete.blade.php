@extends('admin.template')
@section('section')
<p> Seguro que quiere borrar el producto {{ $delete }}</p>
{!! Form::open(['method' => 'DELETE']) !!}

    {!! Form::submit('Eliminar') !!}
{!! Form::close() !!}
@endsection