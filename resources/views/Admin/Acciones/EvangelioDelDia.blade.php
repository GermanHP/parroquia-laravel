@extends('layouts.admin')
@section('content')
    <div class="container panel panel-heading">
        <h3>Publicar Evangelio del Día</h3>

        {!!Form::open(['route'=>'evangelio.store', 'method'=>'POST', 'onsubmit'=>"waitingDialog.show('Guardando Espere... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

        <div class="panel panel-body input-group">
            <div class="input-group form-group">
                {{Form::label('Cita del evangelio'),null,['class'=>'input-group-addon']}}
                {{Form::text('tituloEvangelio',null,['class'=>'form-control', 'placeholder'=>'Cita del evangelio'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Texto del evangelio'),null,['class'=>'input-group-addon']}}
                {{Form::textarea('cuerpoEvangelio',null,['class'=>'form-control', 'placeholder'=>'Cuerpo de evangelio'])}}
            </div>

            {!!Form::submit('Publicar', ['class'=>'btn btn-primary','name'=>'btnPublicarEvangelio'])!!}
            <a href="{{url('/administracion')}}" class="btn btn-warning">Regresar</a>
        </div>
        {!! Form::close() !!}

    </div>
@stop