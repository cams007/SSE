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

Route::get('/tabuladorSalarios', 'TabuladorController@showTabuladorView');

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

    Route::get('/crearAlumno', function(){
        return view('admin.alumnos.crearAlumno');
    });
    Route::get('editarAlumno', function(){
        return view('admin.alumnos.editarAlumno');
    });
    Route::get('crearEmpresa', function(){
        return view('admin.empresa.crearEmpresa');
    });
    Route::get('editarEmpresa', function(){
        return view('admin.empresa.editarEmpresa');
    });

    Route::group(['prefix' => 'alumnos'], function(){
        Route::get('/','AlumnosController@index');
        //Route::get('/crearAlumno','AlumnosController@');
    });

    Route::group(['prefix' => 'empresas'], function(){
        Route::get('/','EmpresasController@index');
        //Route::get('/crearAlumno','AlumnosController@');
    });

    Route::get('/eventos', function(){
        return view('admin.eventos');
    });

    Route::get('/historiasYtips', function(){
        return view('admin.historiasTips');
    });
});

