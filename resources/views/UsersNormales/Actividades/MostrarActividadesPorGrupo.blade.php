@extends('layouts.admin')
@section('content')

    <div class="container panel panel-body">
        <h3>Registro de Actividades</h3>
        <h2>{{$grupoid->nombre}}</h2>


        @include('alertas.flash')
        @include('alertas.errores')
        <?php $rolIdentificador = new \App\Utilities\Rol_Identificador() ?>
        @if($rolIdentificador->RolesGrupo(Auth::user()->id,$grupoid->id)==1||$rolIdentificador->RolesGrupo(Auth::user()->id,$grupoid->id)==2)
        {!!link_to_route('Actividades.Nuevo', $title = 'Nueva Actividad', $parameters = $grupoid->id, $attributes = ['class'=>'btn btn-warning','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}<br><br>
        {!!link_to_route('Actividades.Buscar', $title = 'Buscar Actividades', $parameters = $grupoid->id, $attributes = ['class'=>'btn btn-info','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}<br><br>
        @endif
        <table class="table table-striped" id="mestros">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Tipo de Actividad</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php $vinculacion = new \App\Utilities\VinculacionActividad();
            $rolUsuario = new \App\Utilities\Rol_Identificador()?>

            @foreach($ActividadesGrupo as $actividad)

                @if($vinculacion->Vinculacion(Auth::user()->id,$actividad->actividade->id)||$rolUsuario->RolesGrupo(Auth::user()->id,$grupoid->id)==1||$rolUsuario->RolesGrupo(Auth::user()->id,$grupoid->id)==2||$actividad->actividade->idTipoActividad!=3)
                <tr>
                    <td>{{$actividad->actividade->nombre}}</td>
                    <td>{{$actividad->actividade->descripcion}}</td>
                    <td>{{$actividad->actividade->fechaDeVigencia}}  desde {{$actividad->actividade->HoraInicio}} hasta {{$actividad->actividade->HoraFin}}</td>

                    <td>{{$actividad->actividade->tipoactividad->nombre}}</td>


                    <td>
                        @if($rolUsuario->RolesGrupo(Auth::user()->id,$grupoid->id)!=3)


                        {!!link_to_route('Actividades.Editar', $title = 'Editar', $parameters = $actividad->actividade->id, $attributes = ['class'=>'btn btn-success','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                        @if($actividad->actividade->idTipoActividad==3)
                        {!!link_to_route('Actividad.AsignarParticipacion', $title = 'Asignar Actividad', $parameters = [$grupoid->id,$actividad->actividade->id], $attributes = ['class'=>'btn btn-info','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                        @endif

                        {!!Form::open(['route'=>['Actividad.DesvincularActividad',$actividad->actividade->id], 'method'=>'DELETE', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                        {{Form::text('idGrupo',$grupoid->id,['class'=>'form-control', 'placeholder'=>'Nombre del Grupo','style'=>"display:none"])}}
                            {!!Form::submit('Desvincular Actividad', ['class'=>'btn btn-danger','name'=>'btnPublicarAviso'])!!}

                        {!! Form::close() !!}
                        @endif
                            {!!link_to_route('Actividad.Detalle', $title = 'Detalles', $parameters = $actividad->actividade->id, $attributes = ['class'=>'btn btn-success','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                    </td>
                </tr>
                @endif

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