@extends('layouts.admin')
@section('content')

    <div class="container panel panel-heading">
        <h3>Publicar nueva Actividad</h3>
         <div class="panel panel-body input-group">
             {!!Form::open(['route'=>['Actividades.Insert',0], 'method'=>'POST', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
             <div class="input-group form-group">
                 {{Form::label('Nombre de la Activiadd'),null,['class'=>'input-group-addon']}}
                 {{Form::text('nombreActividad',null,['class'=>'form-control', 'placeholder'=>'Nombre del Grupo'])}}
             </div>
             <div class="input-group form-group">
                 {{Form::label('Descripción de la actividad'),null,['class'=>'input-group-addon']}}
                 {{Form::textarea('descripcionActividad',null,['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
             </div>
             <div class="input-group form-group">
                 {{Form::label('Fecha de la Actividad'),null,['class'=>'input-group-addon']}}
                 {{Form::date('FechaActividad',null,['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
             </div>
             <div class="input-group form-group">
                 {{Form::label('Hora de Inicio'),null,['class'=>'input-group-addon']}}
                 {{Form::time('horaInicio',"07:00",['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
             </div>
             <div class="input-group form-group">
                 {{Form::label('Hora de Finalizacion'),null,['class'=>'input-group-addon']}}
                 {{Form::time('horaFin',"17:00",['class'=>'form-control', 'placeholder'=>'Descripción del Grupo'])}}
             </div>
             <div class="input-group">
                 {{Form::label('Tipo de Actividad'),null,['class'=>'input-group-addon']}}
                 {!! Form::select('tipoActividad',$actividad,null,['class'=>'js-example-basic-single form-control ',"describedby"=>"basic-addon1",'required', 'id'=>'department', 'onchange'=>'GetMunicipios(this)', 'style'=>'width: 100%']) !!}
             </div>
            {!!Form::submit('Publicar', ['class'=>'btn btn-primary','name'=>'btnPublicarAviso'])!!}
            <a href="{{url('/administracion')}}" class="btn btn-warning">Regresar</a>
        </div>
        {{Form::close()}}
    </div>
@stop