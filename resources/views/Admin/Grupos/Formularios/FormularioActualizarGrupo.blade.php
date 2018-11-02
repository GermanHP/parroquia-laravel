
    <div class="panel panel-heading container"><h2>Actualizar Grupo</h2></div>
    <div class="container panel panel-body">
    <div class="input-group form-group">
        {{Form::label('Nombre de grupo',null,['class'=>'input-group-addon'])}}
        {{Form::text('nombre',$grupo->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre de grupo'])}}
    </div>
    <div class="input-group form-group">
        {{Form::label('Descripción de grupo',null,['class'=>'input-group-addon'])}}
        {{Form::text('descripcion',$grupo->descripcion, ['class'=>'form-control', 'placeholder'=>'Descripción de grupo'])}}
    </div>


    {!!Form::submit('Actualizar Grupo', ['class'=>'btn btn-primary','name'=>'btnActualizarGrupo'])!!}
    {!!Form::close()!!}

        <!--<a href="{{url('/grupos')}}"><button class="btn btn-danger btn-align">Regresar </button></a>-->

    </div>

