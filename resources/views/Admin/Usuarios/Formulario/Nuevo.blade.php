
    <h3>Datos del Usuario</h3>
    <div class="input-group form-group">
        {{Form::label('Nombres',null,['class'=>'input-group-addon'])}}
        {{Form::text('nombre',null, ['class'=>'form-control', 'placeholder'=>'Nombres'])}}
    </div>
    <div class="input-group form-group">
        {{Form::label('Apellidos',null,['class'=>'input-group-addon'])}}
        {{Form::text('apellido',null, ['class'=>'form-control', 'placeholder'=>'Apellidos'])}}
    </div>
    <div class="input-group form-group">
        {{Form::label('Correo Electrónico',null,['class'=>'input-group-addon'])}}
        {{Form::email('email',null, ['class'=>'form-control', 'placeholder'=>'e-mail', 'id'=>'correoPadre', 'aria-describedby'=>'basic-addon1'])}}
    </div>

    <div class="input-group form-group">
        {{Form::label('Género',null,['class'=>'input-group-addon'])}}
        <label class="radio-inline">{!! Form::radio('genero','0') !!}Masculino</label>
        <label class="radio-inline">{!! Form::radio('genero','1',true) !!}Femenino</label>
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="basic-addon1">Numero de DUI</span>
        {{Form::text('DUI',null,['class'=>'form-control','pattern'=>'[0-9]{9}','placeholder'=>'123456789', 'maxlength'=>'9'])}}
    </div>
    <div class="input-group form-group">
        <span class="input-group-addon" id="basic-addon1">Fecha de Nacimiento</span>
        {{Form::date('fechaDeNacimiento', \Carbon\Carbon::now()->addYears(-18))}}
    </div>
    <div class="input-group form-group">



            @foreach($roles as $rol)
                <br>
                <li> {!!  Form::checkbox('rolUsuario[]', $rol->id)!!}
                    {!! Form::label($rol->nombre) !!}
                </li>
                <br>
            @endforeach


    </div>
    {!!Form::submit('Guardar Datos', ['class'=>'btn btn-primary','name'=>'btnCrearUsuario'])!!}
    {!!Form::close()!!}

