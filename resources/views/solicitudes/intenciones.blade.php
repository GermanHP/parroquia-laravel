@extends('layouts.app')
@section('content')
    <div class="panel panel-body container">
        <h1 class="text-center">Solicitud de Intenciones</h1>
        <div class="input-group">
            <div class="input-group form-group">
                {{Form::label('Título de la intención'),null,['class'=>'input-group-addon']}}
                {{Form::text('tituloIntencion',null,['class'=>'form-control', 'placeholder'=>'Ej: acción de gracias, aniversario, etc'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Descripción de la intención'),null,['class'=>'input-group-addon']}}
                {{Form::textarea('decripcionIntencion',null,['class'=>'form-control', 'placeholder'=>'Descripción de la intención'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Fecha de la Intención'),null,['class'=>'input-group-addon']}}
                {{Form::date('fechaIntencion', \Carbon\Carbon::now())}}
            </div>
            {!!Form::submit('Solicitar', ['class'=>'btn btn-primary','name'=>'btnIntencion'])!!}
            <a href="{{url('/')}}" class="btn btn-warning">Cancelar</a>
        </div>
    </div>
@stop