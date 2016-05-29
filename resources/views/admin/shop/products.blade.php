@extends('admin.template')

@section('section')



    <div class="container">
        <div class="panel panel-default ">


            <div class="panel-heading">
                <strong>Usuarios</strong>

                {!! HTML::link('admin/shop/purchases', 'Regresar', array('class' => 'btn btn-info pull-right', 'role' => 'button')) !!}
                <div class="clear"></div>
            </div>


            <div class="panel-body">
                @if( !$rows->isEmpty() )

                    <table class="table table-striped">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                        @foreach($rows as $key => $value)
                            <tr>
                                <td>{{ $value->product->name }}</td>
                                <td>{!! $value->quantity  !!} </td>

                            </tr>
                        @endforeach

                    </table>

                @endif
            </div>


        </div>

    </div>


@stop()