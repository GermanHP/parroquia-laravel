@extends('layouts.admin')
@section('content')

    <div class="container panel panel-body">
        <h3>Detalles</h3>
        <div class="label-info form-group">
            {{Form::label('Nombre',null,['class'=>'input-group-addon'])}}
            {{Form::label('Nombre',$actividad->nombre,['class'=>'input-group-addon'])}}
        </div>
        <div class="label-info form-group">
            {{Form::label('Descripcion',null,['class'=>'input-group-addon'])}}
            {{Form::label('',$actividad->descripcion,['class'=>'input-group-addon'])}}
        </div>
        <div class="label-info form-group">
            {{Form::label('Fecha',null,['class'=>'input-group-addon'])}}
            {{Form::label('',$actividad->fechaDeVigencia,['class'=>'input-group-addon'])}}
        </div>
        <div class="label-info form-group">
            {{Form::label('Hora de Inicio',null,['class'=>'input-group-addon'])}}
            {{Form::label('',$actividad->HoraInicio,['class'=>'input-group-addon'])}}
        </div>
        <div class="label-info form-group">
            {{Form::label('Hora de Finalizacion',null,['class'=>'input-group-addon'])}}
            {{Form::label('',$actividad->HoraFin,['class'=>'input-group-addon'])}}
        </div>
        <div class="label-info form-group">
            {{Form::label('Informacion Extra',null,['class'=>'input-group-addon'])}}
            {{Form::label('',$actividad->otrosDatosDeInteres,['class'=>'input-group-addon'])}}
        </div>
        <div class="label-info form-group">
            {{Form::label('Tipo de Actividad ',null,['class'=>'input-group-addon'])}}
            {{Form::label('',$actividad->tipoactividad->nombre,['class'=>'input-group-addon'])}}
        </div>
        <div class="label-info form-group">
            {{Form::label('Grupos Involucrados',null,['class'=>'input-group-addon'])}}

            @foreach($actividad->gruposactividades as $grupos)
                {{Form::label('',$grupos->grupo->nombre,['class'=>'input-group-addon'])}}
                @endforeach
        </div>

        <div class="label-info form-group">
            {{Form::label('Personas Involucradas',null,['class'=>'input-group-addon'])}}<br>

            @foreach($actividad->actividadesusuarios as $usuarios)

                <div class="input-group-addon">
                   <li> {{Form::label('',$usuarios->user->nombre,[''])}}  {{Form::label('',$usuarios->user->apellido,[''])}}</li>
                </div>
                <br>

                @endforeach
        </div>


        <a href="{{ URL::previous() }}" class="btn btn-warning">Regresar</a>


    </div>

@stop