@extends('admin.template')

@section('section')



    <div class="container">
        <div class="panel panel-default ">


            <div class="panel-heading">
                <strong>Usuarios</strong>

                {!! HTML::link('admin/slider/add', 'Nuevo', array('class' => 'btn btn-info pull-right', 'role' => 'button')) !!}
                <div class="clear"></div>
            </div>


            <div class="panel-body">
                @if( !$rows->isEmpty() )
                    <p>Hay {{  $rows->lastPage() }} paginas</p>
                    <p>Resultador por pagina {{  $rows->perPage() }} </p>

                    <table class="table table-striped">
                        <tr>
                            <th>Imagen</th>
                            <th>Texto(s)</th>

                            <th colspan="3">Acciones</th>
                        </tr>

                        @foreach($rows as $key => $value)
                            <tr>
                                <td>{!! HTML::image("assets/uploads/slider/$value->file_image") !!}</td>
                                <td>{{ $value->texts or "vacío" }}</td>




                                <td>{!! HTML::link("admin/slider/edit/{$value->id}", 'Editar', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>
                                <td>{!! HTML::link("admin/slider/delete/{$value->id}", 'Borrar', array('class' => 'btn btn-danger', 'role' => 'button')) !!}</td>
                                <td>{!! HTML::link("admin/slider/edit/{$value->id}/english", 'Ingles', array('class' => 'btn btn-info', 'role' => 'button')) !!}</td>
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