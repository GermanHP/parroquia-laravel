@extends('layouts.admin')
@section('content')

    <div class="container panel panel-body">
    <h3>Registro de Usuarios</h3>
    

    @include('alertas.flash')
    @include('alertas.errores')

        {!!link_to_route('Usuarios.Nuevo', $title = 'Crear Usuario ', $parameters = [], $attributes = ['class'=>'btn btn-success','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
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
            @foreach($usuarios as $user)
                <tr>
                    <td>{{$user->nombre}}</td>
                    <td>{{$user->apellido}}</td>
                    <td>{{$user->fechaDeNacimiento}}</td>

                    <td>

                        @if($user->deleted_at==NULL)
                        {!!link_to_route('Usuarios.Editar', $title = 'Editar Usuario ', $parameters = $user->id, $attributes = ['class'=>'btn btn-success','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                        {!!Form::open(['route'=>['Usuarios.update',$user->id], 'method'=>'DELETE', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                        {!!Form::submit('Desactivar Usuario', ['class'=>'btn btn-danger','name'=>'btnCrearUsuario'])!!}
                        {!! Form::close() !!}
                            @else
                            {!!Form::open(['route'=>['Usuarios.update',$user->id], 'method'=>'DELETE', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
                            {!!Form::submit('Activar Usuario', ['class'=>'btn btn-warning','name'=>'btnCrearUsuario'])!!}
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