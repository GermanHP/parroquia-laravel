@extends('layouts.app')
@section('content')
    <div class="panel panel-body container">
        <h1 class="text-center">Solicitud de Celebraciones</h1>
        <div class="input-group">
            <div class="input-group form-group">
                {{Form::label('Tipo de celebración'),null,['class'=>'input-group-addon']}}
                {{Form::text('tipoCelebracion',null,['class'=>'form-control', 'placeholder'=>'Ej: quince años, boda, etc'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Descripción de la celebración'),null,['class'=>'input-group-addon']}}
                {{Form::textarea('decripcionCelebracion',null,['class'=>'form-control', 'placeholder'=>'Descripción de la celebración'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Fecha de Celebración'),null,['class'=>'input-group-addon']}}
                {{Form::date('fechaCelebracion', \Carbon\Carbon::now())}}
            </div>
            {!!Form::submit('Solicitar', ['class'=>'btn btn-primary','name'=>'btnCelebracion'])!!}
            <a href="{{url('/')}}" class="btn btn-warning">Cancelar</a>
        </div>
    </div>
@stop