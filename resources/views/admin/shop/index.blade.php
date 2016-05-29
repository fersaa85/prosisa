@extends('admin.template')

@section('section')



    <div class="container">
        <div class="panel panel-default ">


            <div class="panel-heading">
                <strong>Productos</strong>

                {!! HTML::link('admin/shop/add', 'Nuevo', array('class' => 'btn btn-info pull-right', 'role' => 'button')) !!}
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
                            <th>Catalogo</th>
                            <th>Imagen</th>

                            <th colspan="4">Acciones</th>
                        </tr>

                        @foreach($rows as $key => $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{!! $value->description  !!} </td>
                                <td>{{ $value->price }}</td>
                                <td>{{ $value->catalog_id }}</td>
                                <td><a href='{{ URL::to("assets/uploads/product/$value->file") }}' target="_blank">{{ $value->file }}</a></td>



                                <td>{!! HTML::link("admin/shop/edit/{$value->id}", 'Editar', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>
                                <td>{!! HTML::link("admin/shop/delete/{$value->id}", 'Borrar', array('class' => 'btn btn-danger', 'role' => 'button')) !!}</td>
                                <td>{!! HTML::link("admin/shop/composition/{$value->id}", 'Composicion', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>
                                <td>{!! HTML::link("admin/shop/edit/{$value->id}/english", 'Ingles', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>
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