@extends('layouts.admin')
@section('content')



            {!!Form::open(['route'=>['Refrescar.Grupo', $grupo->id], 'method'=>'PUT', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
            <div>
                @include('alertas.errores')
                @include('alertas.flash')


                @include('Admin.Grupos.Formularios.FormularioActualizarGrupo')

            </div>


@stop