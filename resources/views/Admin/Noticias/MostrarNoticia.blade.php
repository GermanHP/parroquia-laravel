@extends('layouts.admin')
@section('content')

    <div class="container panel panel-body">
        <h3>Registro de Noticias</h3>



        @include('alertas.flash')
        @include('alertas.errores')


        <table class="table table-striped" id="mestros">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Texto</th>
                <th>Fecha</th>

                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>


            @foreach($noticias as $noticia)

                    <tr>
                        <td>{{$noticia->titulo}}</td>
                        <td>{{$noticia->texto}}</td>
                        <td>{{$noticia->fechaDeValides}}</td>

                        <td>{!!link_to_route('Avisos.Editar', $title = 'Editar noticia', $parameters = $noticia->id, $attributes = ['class'=>'btn btn-info','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                            {!!Form::open(['route'=>['Avisos.destroy',$noticia->id], 'method'=>'DELETE', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

                            {!!Form::submit('Eliminar Noticia', ['class'=>'btn btn-danger','name'=>'btnPublicarAviso'])!!}

                            {!! Form::close() !!}
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