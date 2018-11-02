@extends('layouts.admin')
@section('content')

    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}
    {!! Html::style('https://code.getmdl.io/1.3.0/material.indigo-pink.min.css') !!}
    {!! Html::script('https://code.getmdl.io/1.3.0/material.min.js') !!}

    @include('alertas.flash')
    @include('alertas.errores')

    <!-- Square card -->
    <style>
        .demo-card-square.mdl-card {
            width: 320px;
            height: 320px;
        }
        .demo-card-square > .mdl-card__title {
            color: #fff;
            background:
                    url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
        }

    </style>

    <?php $rolIdentificador = new \App\Utilities\Rol_Identificador()?>

    <div class="panel container">
        <h3 class="text-center">Panel de Administración</h3>

        <hr class="divider">
        @if($rolIdentificador->isAdmin(Auth::user()))
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
            <div class="demo-card-square mdl-card mdl-shadow--2dp" id="actividad">
                <div class="mdl-card__title mdl-card--expand">
                    <img src="img/actividad.png" alt="">
                </div>
                <div class="mdl-card__supporting-text">
                    <h2 class="mdl-card__title-text">Crear Actividad</h2>

                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="{{url('/NuevaActividad')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Crear
                    </a>
                </div>
            </div>
                </div>

                <div class="col-md-4">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp" id="aviso">
                        <div class="mdl-card__title mdl-card--expand">
                            <img src="img/novedad.png" alt="">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Publicar Novedad</h2>

                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/NuevaNovedad')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Publicar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp" id="evangelio">
                        <div class="mdl-card__title mdl-card--expand">
                            <img src="img/evangelio.png" alt="" height="50" width="250">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Publicar Evangelio del Día</h2>

                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/publicarEvangelio')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Publicar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-4">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <img class="center" src="img/upload.png" alt="" width="250">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Subir Archivos</h2>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/SubirArchivos')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Subir
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <img src="img/aviso.png" alt="" height="50" width="250">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Avisos</h2>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/NuevoAviso')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Crear
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <img src="img/grupos.png" alt="">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Grupos</h2>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/grupos')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Administrar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @elseif($rolIdentificador->isGestor(Auth::user()))
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <img src="img/grupos.png" alt="">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Mis Grupos</h2>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/MisGrupos')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Administrar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <img src="img/aviso.png" alt="" height="50" width="250">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Avisos</h2>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/NuevoAviso')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Crear
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <img class="center" src="img/upload.png" alt="" width="250">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Subir Archivos</h2>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/SubirArchivos')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Subir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @elseif($rolIdentificador->isMiembro(Auth::user()))
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <img src="img/grupos.png" alt="">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Mis Grupos</h2>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/MisGrupos')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Administrar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <img src="img/aviso.png" alt="" height="50" width="250">
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="mdl-card__title-text">Avisos</h2>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="{{url('/Avisos')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Crear
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            @endif

    </div>

@stop