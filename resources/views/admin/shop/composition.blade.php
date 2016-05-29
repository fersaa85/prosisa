
@extends('admin.template')

@section('section')



    <div class="container">
        <div class="panel panel-default ">


            <div class="panel-heading">
                <strong>Usuarios</strong>

                {!! HTML::link('admin/shop', 'Regresar', array('class' => 'btn btn-info pull-right', 'role' => 'button')) !!}
                <div class="clear"></div>
            </div>


            <div class="panel-body">



                    <table class="table table-striped">
                        <tr>
                            <th>Quimico</th>
                            <th>Porcentaje</th>

                            <th colspan="2">Acciones</th>
                        </tr>

                        @foreach($Product->composition as $key => $value)
                            <tr>
                                <td>{{ $value->chemical }}</td>
                                <td>{{ $value->porcent }} %</td>

                               <td>{!! HTML::link("admin/shop/delete-composition/{$value->id}", 'Borrar', array('class' => 'btn btn-danger', 'role' => 'button')) !!}</td>
                            </tr>
                        @endforeach

                    </table>



            </div>

            {!! Form::open(['method' => 'POST', 'class'=> 'form-inline']) !!}
                @include('admin.shop.form.composition')
            {!! Form::close() !!}

        </div>

    </div>


@stop()