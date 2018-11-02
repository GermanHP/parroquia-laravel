@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="panel panel-body">
            <h2>Detalle de Grupo</h2>
            <h4></h4>

            <table class="table table-hover" id="detalleGrupo">
                <thead><h3>Detalles</h3></thead>
                <tbody>
                <tr>
                    <td>Nombre</td>
                    <td>{{$grupos->nombre}}</td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td>{{$grupos->descripcion}}</td>
                </tr>
                <tr>
                    <td>Responsable</td>
                    <td>@foreach($grupos->gruposusuarios as $usuarios)
                            @if($usuarios->rolesgrupo->id == 1)
                                {{$usuarios->user->nombre}}{{$usuarios->user->apellido}}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Actividad</td>
                    <td>@foreach($grupos->gruposactividades as $actividad)
                            {{$actividad->actividade->nombre}}
                    @endforeach</td>
                </tr>
                <tr>
                    <td>Detalle Actividad</td>
                    <td>@foreach($grupos->gruposactividades as $actividad)
                            {{$actividad->actividade->descripcion}}
                        @endforeach</td>
                </tr>

                </tbody>
            </table>

            <a href="{{url('/grupos')}}"><button class="btn btn-info btn-align">Regresar </button></a>
            {!!link_to_route('Actualizar.Grupo', $title = 'Actualizar', $parameters = $grupos->id, $attributes = ['class'=>'btn btn-success','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
            {!!link_to_route('Grupo.Delete', $title = 'Eliminar Grupo', $parameters = $grupos->id, $attributes = ['class'=>'btn btn-warning','onclick'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
        </div>
        <script>
            $(document).ready(function () {
                $('#detalleGrupo').DataTable();
            })
        </script>
    </div>
@stop