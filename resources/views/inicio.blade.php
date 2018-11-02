@extends('layouts.app')
@section('content')

    <div class="jumbotron" id="jumbo">
        <!-- CAROUSEL START -->
        <div id="myCarousel" class="carousel slide" data-interval="5000" data-ride="carousel">
            <!--Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img id="slide" src="img/banner1.jpg" alt="First Slide">
                    <div class="carousel-caption">
                        <h3>Jesús dijo:
                            Yo soy la resurrección y la vida.
                            El que cree en mí vivirá, aunque muera;
                            y todo el que vive y cree en mí
                            no morirá jamás.</h3>
                        <p>Juan 11:25-26</p>
                    </div>
                </div>
                <div class="item">
                    <img id="slide" src="img/banner2.jpg" alt="Second Slide">
                    <div class="carousel-caption">
                        <h3>La paga del pecado es muerte,
                            mas la dádiva de Dios es vida eterna
                            en Cristo Jesús, nuestro Señor.</h3>
                        <p>Romanos 6:23</p>
                    </div>
                </div>
                <div class="item">
                    <img id="slide" src="img/banner3.jpg" alt="Third Slide">
                    <div class="carousel-caption">
                        <h3>Y Jesús dijo a Simón: No temas; desde ahora serás pescador de hombres.</h3>
                        <p>Lucas 5:10</p>
                    </div>
                </div>
            </div>
            <!--Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

        <!--CAROUSEL END -->

        <div class="container">
        <h1>Bienvenidos</h1>
        <p>La parroquia San Juan Bautista de Olocuilta ahora cuenta con su plataforma web en donde podrás
        encontrar información oficial de nuestro diario acontecer, podrás consultar un calendario de actividades
        programadas para que no se te escape ninguna, además de conocer los ministerios y demás realidades que
        dan vida a nuestra parroquia.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Saber más</a></p>
        </div>
    </div>

    <!--avisos parroquiales dinámicos (AVISOS DE TIPO GENERAL)-->

    <div class="panel panel-body" id="avisos">
        <h1 class="text-center ">Cartelera de Avisos Parroquiales</h1>
        <?php $contador = 0 ?>
        @foreach($avisos as $aviso)
            <?php $contador++?>
        @if($contador <7)
            <div class="col-md-4">
                <div class="jumbotron">
                    <div class="caption">
                        <h2 class="text-center">{{$aviso->titulo}}</h2>
                        <p class="text-justify">{{$aviso->texto}}</p>
                    </div>
                </div>
            </div>
                @endif
            @endforeach

    </div>

    <div class="col-md-4">
        <div class="thumbnail">
            <img src="img/banios.jpg" alt="...">
            <div class="caption">
                <h3>Construcción oficina parroquial</h3>
                <p>Da inicio la obra de construcción de la oficina parroquial al costado de nuestro templo</p>
                <p><a href="{{url('/oficina')}}" class="btn btn-primary" role="button">Saber más</a></p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="thumbnail">
            <img src="img/jmj2019.jpg" alt="...">
            <div class="caption">
                <h3>¡Nos vamos a Panamá!</h3>
                <p>Comencemos a motivarnos y vamonos a gozar de la gran fiesta.</p>
                <p><a href="{{url('/jmj2019')}}" class="btn btn-primary" role="button">Saber más</a></p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="thumbnail">
            <img src="img/romero.jpg" alt="...">
            <div class="caption">
                <h3>37 Aniversario</h3>
                <p>Conoce un poco de la historia de nuestro beato martir, Oscar Arnulfo Romero</p>
                <p><a href="#" class="btn btn-primary" role="button">Saber más</a></p>
            </div>
        </div>
    </div>

    <!-- The content of your page would go here. -->

    <footer class="footer-distributed">

        <div class="footer-right">

            <a href="https://www.facebook.com/parroquiaolocuilta/" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://play.google.com/store/apps/details?id=com.todociber.parroquiaolocuilta" target="_blank"><i class="fa fa-android"></i></a>
            <a href="https://www.youtube.com/channel/UCy4xN5KJ921EW1CW0ozKksg" target="_blank"><i class="fa fa-youtube-play"></i></a>
        </div>

        <div class="footer-left">

            <p class="footer-links">
                <a href="#">Inicio</a>
                ·
                <a href="{{url('/realidades')}}">Organización Parroquial</a>
                ·
                <a href="#">Acontecer Diosesáno</a>
                ·
                <a href="#">Misales</a>
                ·
                <a href="#avisos">Avisos</a>

            </p>

            <p>Parroquia San Juan Bautista &copy; 2017</p>
        </div>

    </footer>


@stop