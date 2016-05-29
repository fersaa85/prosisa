@extends('admin.template')

@section('section')



    <div class="container">
        <div class="panel panel-default ">


            <div class="panel-heading">
                <strong>Usuarios</strong>

                {!! HTML::link('admin/contend/add', 'Nuevo', array('class' => 'btn btn-info pull-right', 'role' => 'button')) !!}
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
                            <th>Banner</th>
                            <th>Categoria</th>
                            <th colspan="3">Acciones</th>
                        </tr>

                        @foreach($rows as $key => $value)
                            <tr>
                                <td>{!! $value->name or '' !!}</td>
                                <td>{!! $value->description or '' !!}</td>

                                <td>{!! $value->file_image or '' !!}</td>

                                <td>{!! $value->categoryname->name !!}</td>

                                <td>{!! HTML::link("admin/contend/edit/{$value->id}", 'Editar', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>
                                <td>{!! HTML::link("admin/contend/delete/{$value->id}", 'Borrar', array('class' => 'btn btn-danger', 'role' => 'button')) !!}</td>
                                <td>{!! HTML::link("admin/contend/edit/{$value->id}/english", 'Ingles', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>
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