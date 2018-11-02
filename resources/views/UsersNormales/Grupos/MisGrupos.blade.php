@extends('layouts.admin')
@section('content')
    <!--suppress ALL -->
    <div class="container panel panel-body">
        <h3>Registro de Grupos</h3>

        @include('alertas.flash')
        @include('alertas.errores')
        Grupos.SubGrupo
        <table class="table table-striped table-responsive" id="grupos">
            <thead>
            <tr>
                <th>Grupo</th>
                <th>Responsable</th>
                <th>Actividades</th>
                <th>Subgrupos</th>
                <th>Acciones</th>

            </tr>
            </thead>
            <tbody>
            @foreach($grupos as $grupo)
                <tr>
                    <td>{{$grupo->grupo->nombre}}</td>
                    <td>@foreach($grupo->grupo->gruposusuarios as $usuarios)
                            @if($usuarios->rolesgrupo->id == 1)
                                {{$usuarios->user->nombre}}{{$usuarios->user->apellido}}
                            @endif
                        @endforeach
                    </td>
                    <td>{{$grupo->grupo->gruposactividades->count()}}</td>
                    <td>{{$grupo->grupo->grupos->count()}}</td>

                <td>
                    <?php $rolIdentificador = new \App\Utilities\Rol_Identificador();?>
                    @if($rolIdentificador->RolesGrupo(Auth::user()->id,$grupo->grupo->id)==1)
                            {!!link_to_route('Grupo.NuevoUsuario', $title = 'Añadir Miembros', $parameters = $grupo->grupo->id, $attributes = ['class'=>'btn btn-info','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                            {!!link_to_route('Grupos.SubGrupo', $title = 'Añadir SubGrupo', $parameters = $grupo->grupo->id, $attributes = ['class'=>'btn btn-warning','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                        @endif
                        {!!link_to_route('Actividades.Grupo', $title = 'Actividades Del Grupo', $parameters = $grupo->grupo->id, $attributes = ['class'=>'btn btn-success','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

                </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#grupos').DataTable({
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