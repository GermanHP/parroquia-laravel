@extends('layouts.admin')
@section('content')

    <div class="container panel panel-body">
        <h3>Editar Usuario</h3>







        {!!Form::open(['route'=>['Usuarios.update',$user->id], 'method'=>'PUT', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

        @include('alertas.errores')
        @include('alertas.flash')
        @include('Admin.Usuarios.Formulario.Editar')


    </div>

@stop