@extends('layouts.admin')
@section('content')

    <div class="container panel panel-heading">
        <h3>Crear Nuevo Grupo</h3>
        <h2>Crear un grupo perteneciente a {{$grupo->nombre}}</h2>
        {!!Form::open(['route'=>['Grupos.SubGrupoGuardar',$grupo->id], 'method'=>'POST', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
        <div class="panel panel-body input-group">
            <div class="input-group form-group">
                <div class="input-group form-group">
                    {{Form::label('Nombre del Grupo'),null,['class'=>'input-group-addon']}}
                    {{Form::text('nombreGrupo',null,['class'=>'form-control', 'placeholder'=>'Nombre del Grupo'])}}
                </div>
                <div class="input-group form-group">
                    {{Form::label('Descripción del Grupo'),null,['class'=>'input-group-addon']}}
                    {{Form::textarea('descripcionGrupo',null,['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
                </div>
            </div>
            {!!Form::submit('Crear Grupo', ['class'=>'btn btn-primary','name'=>'btnPublicarAviso'])!!}

        </div>
        {!! Form::close() !!}
    </div>
@stop