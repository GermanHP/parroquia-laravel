<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Grupo;


//Inicia Proteccion por SSL de todas las rutas
Route::group(['middleware'=>['SSL']],function(){
    Route::get('/', function () {
        return view('welcome');
    });

Auth::routes();

Route::get('/home', 'HomeController@index');

/*Main*/
Route::get('/', 'MainController@main');
Route::get('/realidades', 'GruposController@realidades');
Route::get('/actividades', 'MainController@calendario');
Route::get('/celebraciones', 'CelebracionesController@solicitarCelebracion');
Route::get('/intenciones', 'CelebracionesController@slicitarIntencion');
Route::get('/EvangelioDelDia', 'EvangelioController@index');
Route::get('/profetica', 'MainController@pastoralProfetica');
Route::get('/liturgica', 'MainController@pastoralLiturgica');
Route::get('/especializada', 'MainController@pastoralEspecial');
Route::get('/movimientos', 'MainController@pastoralMovimientos');
Route::get('/asociaciones', 'MainController@pastoralAsociaciones');

//Inicia Proteccion por SSL de todas las rutas
Route::group(['middleware'=>['SSL']],function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index');

    /*Main*/
    Route::get('/', 'MainController@main');
    Route::get('/realidades', 'GruposController@realidades');
    Route::get('/actividades', 'MainController@calendario');
    Route::get('/celebraciones', 'CelebracionesController@solicitarCelebracion');
    Route::get('/intenciones', 'CelebracionesController@slicitarIntencion');
    Route::get('/EvangelioDelDia', 'EvangelioController@index');
    Route::get('Novedades', 'ActividadesController@showNovedad')->name('Novedades.Mostrar');
    route::get('DetalleNovedad/{id}', 'ActividadesController@detalleNovedad')->name('Detalle.Novedad');
    Route::get('storage/{id}/{archivo}', 'SubirArhivos@DescargarArchivo')->name('Archivos.Mostrar');
    Route::get('Archivos','SubirArhivos@MostrarArchivos')->name('Archivos.Listas');
    //galería
    Route::get('/galeria', 'MainController@galeria');
    Route::get('/oficina', 'MainController@oficina');
    Route::get('/jmj2019', 'MainController@jornada');

/*admins*/
Route::get('/administracion', function(){

    $grupos = Grupo::pluck('nombre', 'id');


        return view('panels.adminpanel',compact('grupos'));
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/grupos','GruposController@showgrupos');
        Route::resource('avisos','AvisosController');
        Route::get('Usuarios/Nuevo','UsuariosController@crear')->name('Usuarios.Nuevo');
        Route::get('Usuarios/Editar/{id}', 'UsuariosController@editar')->name('Usuarios.Editar');
        Route::resource('Usuarios','UsuariosController');
        Route::get('GrupoUsuario/{id}', 'GrupoUsuariosController@GrupoUsuario')->name('Grupo.NuevoUsuario');
        Route::post('VincularUsuarioGrupo/{id}/{idUsuario}','GrupoUsuariosController@VincularUsuarioGrupo')->where('id', '[0-9]+')->where('idUsuario', '[0-9]+')->name('Grupo.VincularUsuario');
        Route::delete('Desvincular/{id}/{idGrupo}','GrupoUsuariosController@Desvincular')->where('id', '[0-9]+')->where('idUsuario', '[0-9]+')->name('Grupo.DesVincularUsuario');
        Route::resource('evangelio','EvangelioController');

        /*grupos*/
        Route::resource('nuevogrupo','NgrupoController');
        Route::get('/detalle_grupo/{id}', 'GruposController@detalleGrupos')->name('Detalle.Grupo');
        Route::get('ActualizarGrupo/{id}','GruposController@ActualizarGrupo')->name('Actualizar.Grupo');
        Route::put('updateGrupo/{id}','GruposController@UpdateGrupo')->name('Refrescar.Grupo');
        Route::get('CrearSubGrupo/{id}','GruposController@CrearSubGrupo')->name('Grupos.SubGrupo');
        Route::post('GuardarSubGrupo/{id}','GruposController@GuardarSubGrupo')->name('Grupos.SubGrupoGuardar');

    //Actividades
    Route::resource('Actividades', 'ActividadesController');
    Route::get('ActividadDetalle/{id}','ActividadesController@Detalles')->name('Actividad.Detalle');
    Route::get('VincularActividadesGrupo','ActividadesController@VincularActividadesGrupos')->name('Actividad.VincularActividadGrupo');


        Route::get('EliminarGrupo/{id}','GruposController@EliminarGrupo')->name('Grupo.Delete');
        Route::get('/NuevoAviso', 'GruposController@nuevoAviso');
        Route::get('/NuevaActividad', 'GruposController@nuevaActividad');
        Route::get('/publicarEvangelio', 'GruposController@Evangelio');
        Route::get('/CrearGrupo', 'GruposController@CrearNuevoGrupo');
    //Novedades
        Route::get('/NuevaNovedad', 'GruposController@novedad');
        Route::post('NovedadesInsert/{id}','ActividadesController@InsertarNovedad')->name('Novedades.Insert');


        //Avisos
        Route::get('Avisos', 'AvisosController@index')->name('Avisos.Mostrar');
        Route::get('AvisosEditar/{id}','AvisosController@edit')->name('Avisos.Editar');
        Route::put('AvisosActualizar/{id}','AvisosController@update')->name('Avisos.update');
        Route::delete('AvisosEliminar/{id}','AvisosController@destroy')->name('Avisos.destroy');

        Route::get('CambiarContraseña','UsuariosController@cambiarPassword')->name('Password.cambiar');
        Route::post('CambiarPassword','UsuariosController@guardarCambioContrasñea')->name('Password.guardar.nuevo');

        //UsuarioNormal
        Route::get('MisGrupos','GruposController@MisGrupos')->name('Grupos.Mios');
        Route::get('Miembros/{id}','GruposController@MisMiembros')->name('Grupos.Miembros');
        Route::get('ActividadesGrupo/{id}','ActividadesGrupoController@ActividadesGrupo')->name('Actividades.Grupo');
        Route::get('NuevaActividad/{id}','ActividadesController@Nueva')->name('Actividades.Nuevo');
        Route::post('ActividadesInsert/{id}','ActividadesController@Insertar')->name('Actividades.Insert');
        Route::get('EditarActividad/{id}','ActividadesController@edit')->name('Actividades.Editar');
        Route::put('GuardarEdicionActividad/{id}','ActividadesController@update')->name('Actividad.EdicionGuardar');
        Route::delete('DesvincularActividad/{id}','ActividadesController@Desvincular')->name('Actividad.DesvincularActividad');
        Route::get('BuscarActividades/{id}','ActividadesController@Buscar')->name('Actividades.Buscar');
        Route::put('VincularActividadGrupo/{idGrupo}/{idActividad}','ActividadesController@VincularActGrupo')->name('VincularActividad.Grupo');
        Route::get('AsignarActividad/{idGrupo}/{idActividad}','ActividadesController@Asignar')->name('Actividad.AsignarParticipacion');
        Route::put('AsignacionActividad/{idGrupo}/{idActividad}','ActividadesController@AsignarInserte')->name('Actividad.AsignacionGuardar');
        Route::delete('QuitarAsignacionActividad/{idUsuario}/{idActividad}','ActividadesController@QuitarAsignacion')->name('Actividad.QuitarAsignacion');

        Route::get('SubirArchivos','SubirArhivos@SubirArchivos')->name('Archivos.Subir');
        Route::post('GuardarArchivos','SubirArhivos@GuaradrArchivos')->name('Archivos.Guardar');
        Route::get('EliminarArchivo/{id}/{nombreArchivo}/{created_at}','SubirArhivos@EliminarArchivo')->name('Archivos.Delete');

    });

    });
});
//Termina Proteccion de SSL de las rutas abajo iran los WS que no necesitan SSL

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function () {
    Route::get('TraerNoticias','WSAppMovil@MostrarNoticias');
    Route::get('TraerEvangelio','WSAppMovil@MostrarEvagnelio');
    Route::get('TraerActividades','WSAppMovil@MostrarActividades');

    /*Route::group(['middleware' => 'jwt-auth'], function () {
        Route::get('getOrdenes/{id}', 'OrdenesAPI@getOrdenes');
        Route::get('getOrdenesPadre/{id}/{idCliente}', 'OrdenesAPI@getOrdenesPadre');
        Route::post('makeOrder', 'OrdenesAPI@makeOrder');
        Route::put('modifyOrder', 'OrdenesAPI@ModifyOrder');
        Route::put('cancelOrder', 'OrdenesAPI@CancelOrder');
        Route::put('executeOrder', 'OrdenesAPI@ExecuteOrder');
        Route::post('makemessage', 'OrdenesAPI@makeMessage');
        Route::get('getCasasAfiliado/{idCliente}', 'OrdenesAPI@getCasasAfiliado');
        Route::get('getCasasProceso/{idCliente}', 'OrdenesAPI@getCasasAfiliadoProcess');
        Route::get('getCedevales/{idCliente}', 'OrdenesAPI@getCedevales');
        Route::get('getOrdenesByClienteCasa/{idCliente}/{idCasa}', 'OrdenesAPI@getOrdenesByCasa');
    });*/
});
