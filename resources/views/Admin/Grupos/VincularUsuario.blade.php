@extends('layouts.admin')
@section('content')
    <div class="container panel panel-body">
        <h3>Añadir  Usuarios</h3>
        <h2>Grupo {{$grupo->nombre}} </h2>

        @include('alertas.flash')
        @include('alertas.errores')

        <table class="table table-striped" id="mestros">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $user)
                <tr>
                    <td>{{$user->nombre}}</td>
                    <td>{{$user->apellido}}</td>
                    <td>{{$user->email}}</td>
                    <td>@if($user->gruposusuarios->count()==0)
                           NO  Vinculado
                        @else

                            @foreach($user->gruposusuarios as $grupos)
                                <?php $existe=0;?>
                                @if($grupos->idGrupo==$grupo->id)
                                    <?php $existe=1;?>

                                @endif
                            @endforeach

                            @if($existe==0)
                                    NO  Vinculado
                                @else
                                    Vinculado
                                @endif
                        @endif</td>

                    <td>
                        {!!Form::open(['route'=>['Grupo.VincularUsuario',$grupo->id,$user->id], 'method'=>'POST', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

                        @if($user->gruposusuarios->count()==0)
                            <div class="input-group">
                                {{Form::label('Rol dentro del Grupo'),null,['class'=>'input-group-addon']}}
                                {!! Form::select('roles',$roles,3,['class'=>'js-example-basic-single form-control ',"describedby"=>"basic-addon1",'required', 'id'=>'department', 'onchange'=>'GetMunicipios(this)', 'style'=>'width: 100%']) !!}
                            </div>
                        @else

                            @foreach($user->gruposusuarios as $grupos)
                                <?php $existe=0;?>
                                @if($grupos->idGrupo==$grupo->id)
                                        <?php $existe=1;?>
                                    <div class="input-group">
                                        {{Form::label('Rol dentro del Grupo'),null,['class'=>'input-group-addon']}}
                                        {!! Form::select('roles',$roles,$grupos->idRolGrupo,['class'=>'js-example-basic-single form-control ',"describedby"=>"basic-addon1",'required', 'id'=>'department', 'onchange'=>'GetMunicipios(this)', 'style'=>'width: 100%']) !!}
                                    </div>
                                    @endif
                                @endforeach

                            @if($existe==0)
                                    <div class="input-group">
                                        {{Form::label('Rol dentro del Grupo'),null,['class'=>'input-group-addon']}}
                                        {!! Form::select('roles',$roles,3,['class'=>'js-example-basic-single form-control ',"describedby"=>"basic-addon1",'required', 'id'=>'department', 'onchange'=>'GetMunicipios(this)', 'style'=>'width: 100%']) !!}
                                    </div>
                                @endif
                         @endif





                        {!!Form::submit('Añadir Usuario', ['class'=>'btn btn-primary','name'=>'btnCrearUsuario'])!!}
                        {!! Form::close() !!}


                        @if($user->gruposusuarios->count()==0)
                            NO  Vinculado
                        @else

                            @foreach($user->gruposusuarios as $grupos)
                                <?php $existe=0;?>
                                @if($grupos->idGrupo==$grupo->id)
                                    <?php $existe=1;?>

                                @endif
                            @endforeach

                            @if($existe==0)
                                NO  Vinculado
                            @else
                                    {!!Form::open(['route'=>['Grupo.DesVincularUsuario',$grupo->id,$user->id], 'method'=>'DELETE', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}


                                    {!!Form::submit('Desvincular Usuario', ['class'=>'btn btn-danger','name'=>'btnCrearUsuario'])!!}
                                    {!! Form::close() !!}
                            @endif
                        @endif





                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#mestros').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                responsive: true,
                "autoWidth": true,

                "order": [[3, 'asc'], [2, 'desc']],
                "language": {


                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Ãšltimo",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }

                }

            });
        })
    </script>
@stop