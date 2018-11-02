@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="text-center">Formulario para publicar una novedad</h3></div>

                    {!!Form::open(['route'=>['Novedades.Insert',0], 'method'=>'POST', 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}

                    <div class="panel-body">
                        <div class="input-group form-group">
                            {{Form::label('Título del aviso'),null,['class'=>'input-group-addon']}}
                            {{Form::text('tituloNovedad',null,['class'=>'form-control', 'placeholder'=>'Título del aviso'])}}
                        </div>
                        <form>
                            {{Form::textarea('descripcionNovedad',null,['class'=>'ckeditor', 'placeholder'=>'Escribir novedad'])}}
                        </form>
                        <br>
                        {!!Form::submit('Publicar', ['class'=>'btn btn-primary','name'=>'btnPublicarNovedad'])!!}
                        <br>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop