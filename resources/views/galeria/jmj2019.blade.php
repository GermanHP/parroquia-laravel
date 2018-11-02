@extends('layouts.app')
@section('content')
    <div class="panel">

        <!-- CAROUSEL START -->
        <div id="myCarousel" class="carousel slide" data-interval="5000" data-ride="carousel">
            <!--Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img id="slide" src="img/jmj/jmj_panama2019.jpg" alt="First Slide">

                </div>
                <div class="item">
                    <img id="slide" src="img/jmj/2_JMJPanama_Krakow2016.jpg" alt="Second Slide">

                </div>
                <div class="item">
                    <img id="slide" src="img/jmj/4-JMJPanama_Rio2013.jpg" alt="Third Slide">
                </div>
                <div class="item">
                    <img id="slide" src="img/jmj/1_JMJPanama_Krakow2016.jpg" alt="Third Slide">

                </div>
                <div class="item">
                    <img id="slide" src="img/jmj/jmjpanama_madrid2011.jpg" alt="Third Slide">

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

        <div class="row">
            <div class="col-md-4">
                <img src="img/jmj/Juan_Pablo.jpg" alt="">
            </div>

            <div class="col-md-8">
                <h1 class="text-center">¿Qué es la JMJ?</h1><br>
                <h4 class="text-justify">La Jornada Mundial de la Juventud (JMJ) es un gran evento religioso y cultural que cada tres años
                    reúne a jóvenes de todo el mundo durante una semana, con el objetivo de dar a conocer a los jóvenes
                    de hoy en día el mensaje de Cristo, y crear un ámbito abierto y de convivencia para compartir y
                    reflexionar juntos sobre los temas fundamentales de la existencia.</h4><br>
                <h4 class="text-justify">Es el evento más internacional y multitudinario que organiza la Iglesia Católica en todo el mundo.
                    El Papa –que preside estas Jornadas– convoca a los jóvenes del planeta una vez cada tres años.
                    Es quien elige el lugar del siguiente encuentro y el tema de la JMJ, orientando tanto el modo de
                    preparación como la celebración de la siguiente. Además, es quien preside la celebración en presencia
                    de obispos de todo el mundo.</h4><br>
                <h1 class="text-center">Historia de la JMJ</h1><br>
                <h4 class="text-justify">El espíritu de la JMJ comenzó en Roma durante el Jubileo de 1983-1984, llamado
                    Año Santo de la Redención. Entre las distintas celebraciones dedicadas a la juventud, la más
                    importante tuvo lugar en la vigilia del Domingo de Ramos, el 15 de abril. Más de 300.000 jóvenes
                    procedentes de todas las partes del mundo (y acogidos por cerca de 6.000 familias romanas)
                    participaron en el Jubileo internacional de la juventud. El 22 de abril de 1984, el Santo Padre Juan
                    Pablo II obsequió a los jóvenes con una cruz de madera que simboliza "el amor del Señor Jesús por la
                    Humanidad” y como anuncio de que “sólo en Cristo, muerto y resucitado, esta la salvación y la redención".</h4>
                <br>
                <h4 class="text-justify">El año 1985 fue proclamado por la ONU Año Internacional de la Juventud. La Iglesia Católica organizó un nuevo encuentro internacional el Domingo de Ramos, el 31 de abril, con otros 350.000 jóvenes que se reunieron en la Plaza de San Pedro. Tras el éxito de esta convocatoria, en diciembre de ese año el Papa instituyó la Jornada Mundial de la Juventud.</h4>
                <br>
                <h4 class="text-justify">El 23 de marzo de 1986, Domingo de Ramos en aquel año, tuvo lugar en Roma la primera Jornada Mundial de la Juventud, con el lema “Siempre dispuestos a dar respuesta a todo el que os pida razón de vuestra esperanza” tomada de la primera Carta de San Pedro (3,15). Fue la primera de una serie de encuentros con jóvenes, que contribuyó a atribuir al Santo Padre el calificativo de "El Papa de los jóvenes". En ella, convocó a los jóvenes para la siguiente JMJ en Buenos Aires, que fue la primera Jornada Mundial de la Juventud de carácter internacional.</h4>
                <br>
                <h1 class="text-center">¿Cuándo se celebra?</h1><br>
                <h4 class="text-justify">La Jornada Mundial de la Juventud se realiza anualmente en cada diócesis del mundo en el Domingo de Ramos, con una ceremonia principal en el Vaticano, desde 1986. Y se alterna con un gran encuentro internacional cada tres años en una gran metrópoli. Estos encuentros internacionales, de varios días de duración, reciben habitualmente el nombre de Jornada Mundial de la Juventud. Desde Santiago de Compostela en 1989 se suele celebrar entre finales de julio y mediados de agosto, para facilitar la asistencia de los jóvenes, pues es cuando coinciden las vacaciones de los estudiantes en el hemisferio norte y en ocasiones las vacaciones de invierno en el hemisferio sur.</h4>
                <br>
                <h1 class="text-center">¿Qué actividades se realizan en la JMJ?</h1><br>
                <h4 class="text-justify">En sus últimas versiones, la JMJ dura de martes a domingo y en ella hay todo tipo de actividades en las que participan el Papa y los miles de jóvenes que asisten. Los días antes de la Jornada se conocen como los días en la diócesis (DED), y son días en que las diócesis del país de acogida abren sus puertas a los peregrinos en camino a la JMJ.</h4>
                <br>
                <h4 class="text-justify">La JMJ propiamente dicha comienza el martes con la Eucaristía de acogida por el Obispo del lugar y el Papa llega normalmente jueves, día en el que se le hace una ceremonia de bienvenida. Durante las mañanas hay catequesis para profundizar en la fe y por las tardes hay diversas actividades culturales y conciertos sobre temas relacionados con la fe y la visión cristiana del hombre.</h4>
                <br>
                <h4 class="text-justify">El viernes por la tarde, suele haber una representación del Vía Crucis, y el sábado una vigilia de oración con el Papa. El domingo tiene lugar la Misa final de la JMJ.</h4>
                <br><br>
            </div>
        </div>

    </div>
@stop