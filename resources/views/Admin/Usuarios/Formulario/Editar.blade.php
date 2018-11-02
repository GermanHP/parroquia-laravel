
<h3>Datos del Usuario</h3>
<div class="input-group form-group">
    {{Form::label('Nombres',null,['class'=>'input-group-addon'])}}
    {{Form::text('nombre',$user->nombre, ['class'=>'form-control', 'placeholder'=>'Nombres'])}}
</div>
<div class="input-group form-group">
    {{Form::label('Apellidos',null,['class'=>'input-group-addon'])}}
    {{Form::text('apellido',$user->apellido, ['class'=>'form-control', 'placeholder'=>'Apellidos'])}}
</div>
<div class="input-group form-group">
    {{Form::label('Correo Electrónico',null,['class'=>'input-group-addon'])}}
    {{Form::email('email',$user->email, ['class'=>'form-control', 'placeholder'=>'e-mail', 'id'=>'correoPadre', 'aria-describedby'=>'basic-addon1'])}}
</div>

<div class="input-group form-group">
    {{Form::label('Género',null,['class'=>'input-group-addon'])}}
    @if($user->genero==1)
    <label class="radio-inline">{!! Form::radio('genero','0') !!}Masculino</label>
    <label class="radio-inline">{!! Form::radio('genero','1',true) !!}Femenino</label>
        @else
        <label class="radio-inline">{!! Form::radio('genero','0',true) !!}Masculino</label>
        <label class="radio-inline">{!! Form::radio('genero','1') !!}Femenino</label>
    @endif
</div>

<div class="input-group form-group">
    <span class="input-group-addon" id="basic-addon1">Numero de DUI</span>
    {{Form::text('DUI',$user->DUI,['class'=>'form-control','pattern'=>'[0-9]{9}','placeholder'=>'123456789', 'maxlength'=>'9'])}}
</div>
<div class="input-group form-group">
    <span class="input-group-addon" id="basic-addon1">Fecha de Nacimiento</span>
    {{Form::date('fechaDeNacimiento', $user->fechaDeNacimiento)}}
</div>
<div class="input-group form-group">



   <?php $rolSeleccionados = $user->rolessistemausuarios;?>



            @foreach($roles as $rol)
                <?php

                $existe = 0;
                ?>

                @foreach($rolSeleccionados as $rolSelec)


                    @if($rolSelec->idRolSistema==$rol->id)
                        <?php
                        $existe = 1;
                        ?>
                    @endif
                @endforeach
                <br>
                @if($existe==1)
                    <li>{!!  Form::checkbox('rolUsuario[]', $rol->id,true)!!}</li>
                @else
                    <li>{!!  Form::checkbox('rolUsuario[]', $rol->id)!!}</li>
                @endif


                {!! Form::label($rol->nombre) !!}
                <br>
            @endforeach



</div>
{!!Form::submit('Guardar Datos', ['class'=>'btn btn-primary','name'=>'btnCrearUsuario'])!!}
{!!Form::close()!!}

