@extends('layouts.admin')
@section('content')
    <div class="container panel panel-heading">
        <h3>Publicar aviso</h3>
        {!!Form::open(['route'=>'avisos.store', 'method'=>'POST', 'onsubmit'=>"waitingDialog.show('Guardando Espere... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
        <div class="panel panel-body input-group">
            <div class="input-group form-group">
                {{Form::label('Título del aviso'),null,['class'=>'input-group-addon']}}
                {{Form::text('tituloAviso',null,['class'=>'form-control', 'placeholder'=>'Título del aviso'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Cuerpo del aviso'),null,['class'=>'input-group-addon']}}
                {{Form::textarea('cuerpoAviso',null,['class'=>'form-control', 'placeholder'=>'Cuerpo del aviso'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Vigencia del Aviso'),null,['class'=>'input-group-addon']}}
                {{Form::date('vigenciaAviso', \Carbon\Carbon::now())}}
            </div>
            {!!Form::submit('Publicar', ['class'=>'btn btn-primary','name'=>'btnPublicarAviso'])!!}
            <a href="{{url('/administracion')}}" class="btn btn-warning">Regresar</a>
        </div>
        {!! Form::close() !!}
    </div>
@stop