@extends('layouts.app')
@section('content')

    <div class="container panel panel-body">
        <h3>Registro de Usuarios</h3>


        @include('alertas.flash')
        @include('alertas.errores')


        <table class="table table-striped" id="mestros">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha de Creacion</th>
                <th>Descargar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($archivos as $archivo)
                <tr>
                    <td>{{$archivo->titulo}}</td>
                    <td>{{$archivo->descripcion}}</td>
                    <td>{{$archivo->created_at}}</td>

                    <td>
                        {!!link_to_route('Archivos.Mostrar', $title = 'Descargar Archivo', $parameters = [$archivo->id,$archivo->nombreArchivo], $attributes = ['class'=>'btn btn-info','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

                       @if(Auth::check())
                            <?php $rolIdentificador = new \App\Utilities\Rol_Identificador();?>
                        @if($rolIdentificador->isAdmin(Auth::user()))
                            {!!link_to_route('Archivos.Delete', $title = 'Borrar Archivo', $parameters = [$archivo->id,$archivo->nombreArchivo,$archivo->created_at], $attributes = ['class'=>'btn btn-danger','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
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
                "autoWidth": true,
                responsive: true,
                "scrollX": true,
                "order": [[2, 'desc']],
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