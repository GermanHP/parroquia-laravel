@extends('layouts.admin')
@section('content')

    <div class="container panel panel-body">
        <h3>Registro de Actividades</h3>
        <h2>{{$grupoid->nombre}}</h2>


        @include('alertas.flash')
        @include('alertas.errores')


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
            <?php $vinculacion = new \App\Utilities\VinculacionActividad() ?>
            @foreach($ActividadesGrupo as $actividad)
                    @if(!$vinculacion->Vinculacion($actividad->id,$grupoid->id))
                    <tr>
                        <td>{{$actividad->nombre}}</td>
                        <td>{{$actividad->descripcion}}</td>
                        <td>{{$actividad->fechaDeVigencia}}  desde {{$actividad->HoraInicio}} hasta {{$actividad->HoraFin}}</td>

                        <td>{{$actividad->tipoactividad->nombre}}</td>


                        <td>
                            {!!Form::open(['route'=>['VincularActividad.Grupo',$grupoid->id,$actividad->id], 'method'=>'PUT', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                            {!!Form::submit('Vincular Actividad', ['class'=>'btn btn-success','name'=>'btnPublicarAviso'])!!}
                            {!! Form::close() !!}
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