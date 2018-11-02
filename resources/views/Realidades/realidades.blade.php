@extends('layouts.app')
@section('content')

    <div class="container panel panel-body color-fondo">
        <h1 class="text-center">Organigrama Pastoral</h1>
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="img/realidades/logo-pastoral-profetica.jpg" alt="...">
                <div class="caption">
                    <h3>Pastoral Profética</h3>
                    <p>Da inicio la obra de construcción de los baños al costado de nuestro templo</p>
                    <p><a href="{{url('/profetica')}}" class="btn btn-primary" role="button">Conocer</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="thumbnail">
                <img src="img/realidades/logo-pastoral-liturgica.jpg" alt="...">
                <div class="caption">
                    <h3>Pastoral Litúrgica</h3>
                    <p>Comencemos a motivarnos y vamonos a gozar de la gran fiesta.</p>
                    <p><a href="{{url('/liturgica')}}" class="btn btn-primary" role="button">Conocer</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="thumbnail">
                <img src="img/realidades/logo-pastoral-especializada.jpg" alt="...">
                <div class="caption">
                    <h3>Pastoral Especializada</h3>
                    <p>Conoce un poco de la historia de nuestro beato martir, Oscar Arnulfo Romero</p>
                    <p><a href="{{url('/especializada')}}" class="btn btn-primary" role="button">Conocer</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="thumbnail">
                <img src="img/realidades/movimientos.jpg" alt="...">
                <div class="caption">
                    <h3>Movimientos</h3>
                    <p>Conoce un poco de la historia de nuestro beato martir, Oscar Arnulfo Romero</p>
                    <p><a href="{{url('/movimientos')}}" class="btn btn-primary" role="button">Conocer</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="thumbnail">
                <img src="img/realidades/asociaciones.jpg" alt="...">
                <div class="caption">
                    <h3>Asociaciones</h3>
                    <p>Conoce un poco de la historia de nuestro beato martir, Oscar Arnulfo Romero</p>
                    <p><a href="{{url('/asociaciones')}}" class="btn btn-primary" role="button">Conocer</a></p>
                </div>
            </div>
        </div>
    </div>
@stop