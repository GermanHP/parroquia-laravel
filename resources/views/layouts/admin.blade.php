<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }} </title>
    <!--Styles-->
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="img/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
{!! Html::style('assets/css/bootstrap.css') !!}
<!-- Font Awesome -->

{!! Html::style('assets/css/font-awesome.css') !!}
{!! Html::style('dist/css/select2.css') !!}
<!-- Ionicons -->
{!! Html::script('http://code.jquery.com/jquery-latest.js') !!}
<!-- DataTables -->
{!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
<!-- Theme style -->
{!! Html::style('assets/dist/css/AdminLTE.css') !!}
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
{!! Html::style('assets/dist/css/skins/_all-skins.css') !!}
<!-- jQuery 2.1.4 -->
{!! Html::script('assets/plugins/jQuery/jQuery-2.1.4.min.js') !!}

{!! Html::script('dist/js/select2.full.js') !!}
<!-- Bootstrap 3.3.5 -->
{!! Html::script('assets/js/bootstrap.min.js') !!}
<!-- DataTables -->
{!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
<!-- SlimScroll -->
{!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
{!! Html::script('assets/plugins/fastclick/fastclick.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('assets/dist/js/app.min.js') !!}
<!-- AdminLTE for demo purposes -->
    {!! Html::script('assets/dist/js/demo.js') !!}

    {!! Html::script('assets/plugins/datepicker/bootstrap-datepicker.js') !!}

    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}
    {!! Html::script('assets/plugins/datepicker/locales/bootstrap-datepicker.es.js') !!}
    {!! Html::script('assets/js/jquery.mask.min.js') !!}

    {!! Html::style('assets/plugins/datepicker/datepicker3.css') !!}
    {!! Html::script('assets/js/loading.js') !!}
    {!! Html::script('assets/js/SERO.js') !!}
    {!! Html::style('assets/css/SERO.css') !!}

    {!! Html::script('vendors/ckeditor/ckeditor.js') !!}
    {!! Html::style('css/app.css') !!}

    {!! Html::style('css/styles.css') !!}
    {!! Html::style('css/admin.css') !!}


</head>
<body>
<div id="app">
    <?php $rolIdentificador = new \App\Utilities\Rol_Identificador()?>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{url("/")}}">{{ config('app.name', 'Laravel') }}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if($rolIdentificador->isAdmin(Auth::user()))
                <ul class="nav navbar-nav">
                    <li id="inicio"><a href="{{url('/administracion')}}">Inicio<span class="sr-only"></span></a></li>
                    <li id="acontecer"><a href="{{url('/NuevaActividad')}}">Crear actividad</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Novedades<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="organizacion"><a href="{{url('/NuevaNovedad')}}">Publicar Novedad</a></li>
                            <li id="drop"><a href="{{url('/Novedades')}}">Historial</a></li>
                        </ul>
                    </li>
                    <li id="loguear"><a href="{{url('/publicarEvangelio')}}">Publicar evangelio del día</a></li>
                    <li id="loguear"><a href="{{url('/SubirArchivos')}}">Subir Archivos</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Avisos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="organizacion"><a href="{{url('/NuevoAviso')}}">Publicar Aviso</a>
                            <li id="drop"><a href="{{url('/Avisos')}}">Avisos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grupos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="inicio"><a href="{{url('/CrearGrupo')}}">Crear grupo</a></li>
                            <li><a href="{{url('/grupos')}}">Administrar Grupos</a></li>
                            <li id="acontecer"><a href="{{url('/Usuarios')}}">Usuarios en el Sistema</a></li>
                        </ul>
                    </li>
                </ul>

            @elseif($rolIdentificador->isGestor(Auth::user()))
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/MisGrupos')}}">Mis Grupos</a></li>
                        <li><a href="{{url('/Avisos')}}">Avisos</a></li>
                        <li><a href="{{url('/SubirArchivos')}}">Subir Archivos</a></li>
                        <li><a href="{{url('/CrearGrupo')}}">Crear grupo</a></li>
                        <li><a href="{{url('/grupos')}}">Administrar Grupos</a></li>
                    </ul>
            @elseif($rolIdentificador->isMiembro(Auth::user()))
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/MisGrupos')}}">Mis Grupos</a></li>
                        <li><a href="{{url('/Avisos')}}">Avisos</a></li>
                    </ul>
            @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/CambiarContraseña')}}">Cambiar Contraseña</a></li>

                            <li id="drop"><a href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </div>
    </nav>
        @include('alertas.errores')
        @include('alertas.flash')
    @yield('content')
</div>
</body>
</html>