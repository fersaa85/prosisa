@extends('admin.template')

@section('section')



    <div class="container">
        <div class="panel panel-default ">


            <div class="panel-heading">
                <strong>Ordenes</strong>


                <div class="clear"></div>
            </div>


            <div class="panel-body">
                @if( !$rows->isEmpty() )
                    <p>Hay {{  $rows->lastPage() }} paginas</p>
                    <p>Resultador por pagina {{  $rows->perPage() }} </p>

                    <table class="table table-striped">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Pais</th>
                            <th>Ciudad</th>
                            <th>Colonia/Municipio</th>
                            <th>Calle</th>
                            <th>C.P.</th>
                            <th>Recibido</th>
                            <th>Fecha de pago</th>
                            <th>Atendido</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                        @foreach($rows as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{!! $value->item_name  !!} </td>
                                <td>{{ $value->custom }}</td>
                                <td>{{ $value->address_country }}</td>
                                <td>{{ $value->address_state }}</td>
                                <td>{{ $value->address_city }}</td>
                                <td>{{ $value->address_street }}</td>
                                <td>{{ $value->address_zip }}</td>
                                <td>{{ $value->receiver_id }}</td>
                                <td>{{ $value->payment_date }}</td>
                                <td align="center">{{ $value->dressed }}</td>
                                <td>{!! HTML::link("admin/shop/products/{$value->id}", 'Productos', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>
                                <td>{!! HTML::link("admin/shop/dressed/{$value->id}", 'Atendido', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>

                            </tr>
                        @endforeach

                    </table>
                    <div class="text-center">
                        {!! $rows->render() !!}
                    </div>

                @endif
            </div>


        </div>

    </div>


@stop()