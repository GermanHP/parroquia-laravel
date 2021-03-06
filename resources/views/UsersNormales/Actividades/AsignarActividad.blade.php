@extends('layouts.admin')
@section('content')

    <div class="container panel panel-body">
        <h3>Registro de Usuarios</h3>


        @include('alertas.flash')
        @include('alertas.errores')


        <table class="table table-striped" id="mestros">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha De Nacimiento</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($grupo->gruposusuarios as $user)
                <tr>
                    <td>{{$user->user->nombre}}</td>
                    <td>{{$user->user->apellido}}</td>
                    <td>{{$user->user->fechaDeNacimiento}}</td>

                    <td>

                        <?php $vinculacion = new \App\Utilities\VinculacionActividad()?>
                        @if(!$vinculacion->ActividadAsignada($user->user->id,$actividad->id))
                        {!!Form::open(['route'=>['Actividad.AsignacionGuardar',$user->id,$actividad->id], 'method'=>'PUT', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                                {{Form::text('idUsuario',$user->user->id,['class'=>'form-control', 'placeholder'=>'Nombre del Grupo','style'=>"display:none"])}}
                                {!!Form::submit('Asignar Actividad', ['class'=>'btn btn-info','name'=>'btnPublicarAviso'])!!}
                        {!! Form::close() !!}
                            @else
                                {!!Form::open(['route'=>['Actividad.QuitarAsignacion',$user->user->id,$actividad->id], 'method'=>'DELETE', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

                                {!!Form::submit('Quitar Asignacion', ['class'=>'btn btn-danger','name'=>'btnPublicarAviso'])!!}
                                {!! Form::close() !!}
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