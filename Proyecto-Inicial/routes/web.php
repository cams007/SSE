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

// Rutas de login y registro (auth)
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/registro', 'RegistroController@showRegistroForm')->name('user.registro');
Route::get('/bienvenida', 'RegistroController@showBienvenidaForm')->name('user.bienvenida');

Route::group(['prefix' => 'perfil'], function() {
    Route::get('/', 'PerfilController@showPerfilForm')->name('perfil');
    Route::get('estudiosRealizados', 'PerfilController@showEstudiosForm')->name('perfil.estudiosRealizados');
    Route::get('primerEmpleo', 'PerfilController@showPrimerEmpleoForm')->name('perfil.primerEmpleo');
    Route::get('empleos', 'PerfilController@showEmpleosForm')->name('perfil.empleos');
    Route::get('satisfaccion', 'PerfilController@showSatisfaccionForm')->name('perfil.satisfaccion');

    Route::get('intereses', function() {
        return view('egresados.perfil.intereses');
    });
    Route::get('ofertaslab', function() {
        return view('egresados.perfil.ofertaslab');
    });
    
    Route::post('/', 'PerfilController@saveDatosB');
    Route::post('estudiosRealizados', 'PerfilController@saveFormacionPerson');
    Route::post('primerEmpleo', 'PerfilController@savePrimerEmp');
    Route::post('intereses', 'PerfilController@saveFormacionProf');
});


Route::group(['prefix' => 'ofertas'], function() {
    Route::get('/', 'OfertasController@index');
});

Route::group(['prefix' => 'directorio'], function() {
    Route::get('/', 'DirectorioController@index');
    Route::get('empresa', 'DirectorioController@showEmpresaView');
    Route::get('empresa/comentarios', 'DirectorioController@showComentariosEmpresaView');
    Route::get('empresa/ofertas', 'DirectorioController@showOfertasEmpresaView');
});

Route::get('/ranking', 'RankingController@showRankingView');

Route::get('/tabuladorSalarios', function(){
    return view('egresados.tabuladorSalarios');
});

Route::group(['prefix' => 'eventos'], function() {
    Route::get('/', 'EventosController@index');
    Route::get('/culturales', 'EventosController@culturales');
    Route::get('/academicos', 'EventosController@academicos');
});

Route::get('/historiasExito', 'HistoriasExitoController@index');
Route::get('/tipsConsejos', 'TipsConsejosController@index');





//Rutas para la seccion de Administrador@
Route::group(['prefix' => 'admin'], function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Grupo de rutas para las vistas de egresados url(/admin/egresado/...)
    Route::group(['prefix' => 'egresado'], function(){
        Route::get('/','EgresadosAdminController@index');
        Route::get('/crearEgresado','EgresadosAdminController@showCrearEgresado')->name('admin.crearEgresado');
        Route::post('/crearEgresado','EgresadosAdminController@saveEgresado')->name('admin.crearEgresado.submit');
        Route::get('/editarEgresado','EgresadosAdminController@showEditarEgresado')->name('admin.editarEgresado');
    });

    //Grupo de rutas para las vistas de empresas (admin/empresas/..)
    Route::group(['prefix' => 'empresas'], function(){
        Route::get('/','EmpresasController@index');
        Route::get('/crearEmpresa','EmpresasController@showCrearEmpresa')->name('admin.crearEmpresa');
        Route::get('/editarEmpresa','EmpresasController@showEditarEmpresa')->name('admin.editarEmpresa');
    });

    //Grupo de rutas para las vistas de eventos (admin/eventos/..)
    Route::group(['prefix' => 'eventos'], function(){
        Route::get('/','EventosAdminController@index');
        Route::get('/crearEvento','EventosAdminController@showCrearEvento')->name('admin.crearEvento');
        Route::post('/crearEvento','EventosAdminController@saveEvento')->name('admin.crearEvento.submit');
        Route::get('/editarEvento/{id}','EventosAdminController@showEditarEvento')->name('admin.editarEvento');
        Route::post('/editarEvento','EventosAdminController@saveEditarEvento')->name('admin.editarEvento.submit');
        Route::get('/eliminarEvento/{id}','EventosAdminController@eliminarEvento')->name('admin.eliminarEvento');

    });

    //Grupo de rutas para las historias de éxito (admin/historiasdeExito/..)
    Route::group(['prefix' => 'historiasdeExito'], function(){
        Route::get('/', 'HistoriasDeAdminController@indexH');
        Route::get('/crearHistoriaDe','HistoriasDeAdminController@showCrearHistoria')->name('admin.crearHistoria');
        Route::post('/crearHistoriaDe','HistoriasDeAdminController@saveHistoria')->name('admin.crearHistoria.submit');
        Route::get('/editarHistoriaDe/{id}','HistoriasDeAdminController@showEditarHistoria')->name('admin.editarHistoria');
        Route::post('/editarHistoriaDe','HistoriasDeAdminController@saveEditarHistoria')->name('admin.editarHistoria.submit');
    });

    //Grupo de rutas para los tips y consejos. (admin/tipConsejo/..)
    Route::group(['prefix' => 'tipConsejo'], function(){
        Route::get('/','TipsYConsejosAdminController@index');
        Route::get('/crearTipConsejo','TipsYConsejosAdminController@showCreateTip')->name('admin.crearTipConsejo');
        Route::post('/crearTipConsejo','TipsYConsejosAdminController@saveCrearTip')->name('admin.crearTipConsejo.submit');
        Route::get('/editarTipConsejo/{id}','TipsYConsejosAdminController@showEditarTip')->name('admin.editarTipConsejo');
        Route::post('/editarTipConsejo','TipsYConsejosAdminController@saveEditarTip')->name('admin.editarTipConsejo.submit');
    });
});

