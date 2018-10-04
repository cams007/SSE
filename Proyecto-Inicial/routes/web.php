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
// Authentication routes...
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/logout', 'Auth\LogoutController@logout')->name('user.logout');

Route::get('/registro','RegistroController@showRegistroForm')->name('crearUsuario');
Route::post('/registro','RegistroController@saveUsuario')->name('crearUsuario.submit');

Route::get('/bienvenida', 'RegistroController@showBienvenidaForm')->name('user.bienvenida');

// Login de usuarios
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');

Route::get('/change/password', 'CambiarPasswordController@showChangeForm');
Route::post('/change/confirm', 'CambiarPasswordController@confirmNewPassword')->name( 'confirmar.submit' );

Route::get('/change/password/admin', 'CambiarPasswordAdminController@showChangeForm');
Route::post('/change/confirm/admin', 'CambiarPasswordAdminController@confirmNewPassword')->name( 'passrwordconfirmar.submit' );

//Rutas para la seccion de Administrador@
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

    Route::post('guardar', 'PerfilController@saveDatosBasicos');
    Route::post('upphoto', 'PerfilController@updatePhoto');
    Route::post('uploadcv', 'PerfilController@uploadCV');
    Route::post('estudiosRealizados', 'PerfilController@saveFormacionPerson');

    Route::post('guardarFormacion', 'PerfilController@saveFormacion');

    Route::post('primerEmpleo', 'PerfilController@savePrimerEmp');
    Route::post('guardarsatisfaccion', 'PerfilController@saveSatisfaccion');
    Route::post('guardarmaestria', 'PerfilController@saveMaestria');
    Route::post('guardardoctorado', 'PerfilController@saveDoctorado');
    Route::post('guardarempleo', 'PerfilController@saveEmpleo');

    Route::post('intereses', 'PerfilController@saveFormacionProf');
});


Route::group(['prefix' => 'ofertas'], function() {
    Route::get('/', 'OfertasController@index');
    Route::post('postularme', 'OfertasController@savePost');
});

Route::group(['prefix' => 'directorio'], function() {
    Route::get('/', 'DirectorioController@index');
    Route::get('empresa', 'DirectorioController@showEmpresaView');
    Route::post('empresa/calificar','DirectorioController@saveCalificacion')->name('guardarCalificacion.submit');
    Route::get('empresa/comentarios', 'DirectorioController@showComentariosEmpresaView');
    Route::get('empresa/ofertas', 'DirectorioController@showOfertasEmpresaView');
    Route::get('empresa/ofertas', 'DirectorioController@showOfertasEmpresaView');
});

Route::get('/ranking', 'RankingController@showRankingView');

Route::get('/tabuladorSalarios', 'TabuladorController@showTabuladorView');

Route::group(['prefix' => 'eventos'], function() {
    Route::get('/', 'EventosController@index');
    Route::get('/culturales', 'EventosController@culturales');
    Route::get('/academicos', 'EventosController@academicos');
});

Route::get('/historiasExito', 'HistoriasExitoController@index');
Route::get('/tipsConsejos', 'TipsConsejosController@index');


//Rutas para la seccion de Administrador@
Route::group(['prefix' => 'admin'], function()
{
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::post('/logout', 'Auth\AdminLogoutController@logout')->name('admin.logout');
    //Route::post('/', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/home', 'HomeAdminController@index')->name('admin.home');

    //Grupo de rutas para las vistas de egresados url(/admin/egresado/...)
    Route::group(['prefix' => 'egresado'], function(){
        Route::get('/','EgresadosAdminController@index');
        
        Route::get('/reporte/{string}','ReporteAdminController@showReporteView')->name('admin.reporte');

        Route::get('/crearEgresado','EgresadosAdminController@showCrearEgresado')->name('admin.crearEgresado');
        Route::post('/crearEgresado','EgresadosAdminController@saveEgresado')->name('admin.crearEgresado.submit');
        Route::get('/editarEgresado/{ma}','EgresadosAdminController@showEditarEgresado')->name('admin.editarEgresado');
        Route::post('/editarEgresado','EgresadosAdminController@saveEditarEgresado')->name('admin.editarEgresado.submit');
        Route::post('/eliminarEgresado','EgresadosAdminController@eliminarEgresado')->name('admin.eliminarEgresado.submit');
    });

    //Grupo de rutas para las vistas de empresas (admin/empresas/..)
    Route::group(['prefix' => 'empresas'], function(){
        Route::get('/','EmpresasAdminController@index');
        
        Route::get('/reporte/{string}','ReporteAdminController@showReporteViewEmpresas');

        Route::get('/crearEmpresa','EmpresasAdminController@showCrearEmpresa')->name('admin.crearEmpresa');
        Route::post('/crearEmpresa','EmpresasAdminController@saveCrearEmresa')->name('admin.crearEmpresa.submit');
        Route::get('/editarEmpresa/{id}','EmpresasAdminController@showEditarEmpresa')->name('admin.editarEmpresa');
        Route::post('/editarEmpresa','EmpresasAdminController@saveEditarEmpresa')->name('admin.editarEmpresa.submit');
        Route::post('/eliminarEmpresa','EmpresasAdminController@eliminarEmpresa')->name('admin.eliminarEmpresa.submit');
    });

    //Grupo de rutas para las vistas de eventos (admin/eventos/..)
    Route::group(['prefix' => 'eventos'], function(){
        Route::get('/','EventosAdminController@index');
        Route::get('/reporte/{string}','ReporteAdminController@showReporteViewEventos');

        Route::get('/crearEvento','EventosAdminController@showCrearEvento')->name('admin.crearEvento');
        Route::post('/crearEvento','EventosAdminController@saveEvento')->name('admin.crearEvento.submit');
        Route::get('/editarEvento/{id}','EventosAdminController@showEditarEvento')->name('admin.editarEvento');
        Route::post('/editarEvento','EventosAdminController@saveEditarEvento')->name('admin.editarEvento.submit');
        Route::post('/eliminarEvento','EventosAdminController@eliminarEvento')->name('admin.eliminarEvento.submit');

    });

    //Grupo de rutas para las historias de éxito (admin/historiasdeExito/..)
    Route::group(['prefix' => 'historiasdeExito'], function(){
        Route::get('/', 'HistoriasDeAdminController@indexH');
        Route::get('/crearHistoriaDe','HistoriasDeAdminController@showCrearHistoria')->name('admin.crearHistoria');
        Route::post('/crearHistoriaDe','HistoriasDeAdminController@saveHistoria')->name('admin.crearHistoria.submit');
        Route::get('/editarHistoriaDe/{id}','HistoriasDeAdminController@showEditarHistoria')->name('admin.editarHistoria');
        Route::post('/editarHistoriaDe','HistoriasDeAdminController@saveEditarHistoria')->name('admin.editarHistoria.submit');
        Route::post('/eliminarHistoriaDe','HistoriasDeAdminController@EliminarHistoria')->name('admin.eliminarHistoria.submit');
    });

    //Grupo de rutas para los tips y consejos. (admin/tipConsejo/..)
    Route::group(['prefix' => 'tipConsejo'], function(){
        Route::get('/','TipsYConsejosAdminController@index');
        Route::get('/crearTipConsejo','TipsYConsejosAdminController@showCreateTip')->name('admin.crearTipConsejo');
        Route::post('/crearTipConsejo','TipsYConsejosAdminController@saveCrearTip')->name('admin.crearTipConsejo.submit');
        Route::get('/editarTipConsejo/{id}','TipsYConsejosAdminController@showEditarTip')->name('admin.editarTipConsejo');
        Route::post('/editarTipConsejo','TipsYConsejosAdminController@saveEditarTip')->name('admin.editarTipConsejo.submit');
        Route::post('/eliminarTipConsejo','TipsYConsejosAdminController@showEliminarTip')->name('admin.eliminarTipConsejo.submit');
    });

    //Grupo de rutas para los ofertas. (admin/ofertas/..)
    Route::group(['prefix' => 'ofertas'], function() {
        Route::get('/','OfertasLaboralesAdminController@index');

        Route::get('/reporte/{string}','ReporteAdminController@showReporteViewOfertas');

        Route::post('/eliminarOferta','OfertasLaboralesAdminController@eliminarOferta')->name('admin.eliminarOferta.submit');
        Route::get('/crearOferta','OfertasLaboralesAdminController@showCrearOferta')->name('admin.crearOferta');
        Route::post('/crearOferta','OfertasLaboralesAdminController@saveOferta')->name('admin.crearOferta.submit');
        Route::get('/editarOferta/{id}','OfertasLaboralesAdminController@showEditarOferta')->name('admin.editarOferta');
        Route::post('/editarOferta','OfertasLaboralesAdminController@saveEditarOferta')->name('admin.editarOferta.submit');
    });

    /*
    * Rutas para indices y estadisticas
    */
    Route::group( [ 'prefix' => 'estadisticas' ], function() {
        Route::get('/', 'IndicesEstadisticasController@showEstadisticasView');
    } );
    //Route::get('/estadisticas', 'IndicesEstadisticasController@showEstadisticasView');
});
