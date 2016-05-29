@extends('admin.template')
@section('section')
<p> Seguro que quiere borrar este quimico  {{ $delete }}</p>
{!! Form::open(['method' => 'DELETE']) !!}

{!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}
@endsection