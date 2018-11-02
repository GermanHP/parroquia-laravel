@extends('layouts.admin')
@section('content')

    <div class="container panel panel-body">
        <h3>Nuevo Usuario</h3>

                {!!Form::open(['route'=>['Usuarios.store'], 'method'=>'POST', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

                    @include('alertas.errores')
                    @include('alertas.flash')
                    @include('Admin.Usuarios.Formulario.Nuevo')


    </div>

@stop