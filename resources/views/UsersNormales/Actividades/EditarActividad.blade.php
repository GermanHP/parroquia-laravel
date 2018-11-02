@extends('layouts.admin')
@section('content')

    <div class="container panel panel-heading">
        <h3>Crear Nueva Actividad</h3>
        {!!Form::open(['route'=>['Actividad.EdicionGuardar',$actividad->id], 'method'=>'PUT', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
        <div class="panel panel-body input-group">
            <div class="input-group form-group">
                <div class="input-group form-group">
                    {{Form::label('Nombre de la Activiadd'),null,['class'=>'input-group-addon']}}
                    {{Form::text('nombreActividad',$actividad->nombre,['class'=>'form-control', 'placeholder'=>'Nombre del Grupo'])}}
                </div>
                <div class="input-group form-group">
                    {{Form::label('Descripción de la actividad'),null,['class'=>'input-group-addon']}}
                    {{Form::textarea('descripcionActividad',$actividad->descripcion,['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
                </div>
                <div class="input-group form-group">
                    {{Form::label('Fecha de la Actividad'),null,['class'=>'input-group-addon']}}
                    {{Form::date('FechaActividad',$actividad->fechaDeVigencia,['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
                </div>
                <div class="input-group form-group">
                    {{Form::label('Hora de Inicio'),null,['class'=>'input-group-addon']}}
                    {{Form::time('horaInicio',$actividad->HoraInicio,['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
                </div>
                <div class="input-group form-group">
                    {{Form::label('Hora de Finalizacion'),null,['class'=>'input-group-addon']}}
                    {{Form::time('horaFin',$actividad->HoraFin,['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
                </div>
                <div class="input-group">
                    {{Form::label('Tipo de Actividad'),null,['class'=>'input-group-addon']}}
                    {!! Form::select('tipoActividad',$tipoActividad,$actividad->idTipoActividad,['class'=>'js-example-basic-single form-control ',"describedby"=>"basic-addon1",'required', 'id'=>'department', 'onchange'=>'GetMunicipios(this)', 'style'=>'width: 100%']) !!}
                </div>
            </div>
            {!!Form::submit('Guardar Actividad', ['class'=>'btn btn-primary','name'=>'btnPublicarAviso'])!!}
            <a href="{{ URL::previous() }}" class="btn btn-warning">Regresar</a>
        </div>
        {!! Form::close() !!}
    </div>
@stop