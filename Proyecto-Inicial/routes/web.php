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


Route::get('/', function () {
    return view('egresados.index');
});

Route::get('/home', function () {
    return view('egresados.home');
});

Route::get('/registro', function() {
    return view('egresados.registro.registrarse');
});

Route::get('/bienvenida', function() {
    return view('egresados.registro.bienvenida');
});

Route::group(['prefix' => 'perfil'], function() {
    
    Route::get('/' , function () {
        return view('egresados.perfil.index', ['egresados' => App\Egresado::where('nacionalidad', '<>', null)->first()]);
    });
    Route::get('fpersonal', function() {
        return view('egresados.perfil.fPersonal');
    });
    Route::get('experiencia', function() {
        return view('egresados.perfil.experiencia');
    });
    Route::get('dprofesional', function() {
        return view('egresados.perfil.dprofesional');
    });
    
    Route::get('fprofesional', function() {
        return view('egresados.perfil.fProfesional', array('dato' => 'No'));
    });
    Route::get('intereses', function() {
        return view('egresados.perfil.intereses');
    });
    Route::get('ofertaslab', function() {
        return view('egresados.perfil.ofertaslab');
    });
    
    Route::post('/', 'PerfilController@saveDatosB');
    Route::post('fpersonal', 'PerfilController@saveFormacionPerson');
    Route::post('experiencia', 'PerfilController@savePrimerEmp');
    Route::post('intereses', 'PerfilController@saveFormacionProf');
});


Route::group(['prefix' => 'ofertas'], function() {
    Route::get('/', 'OfertasController@index');
});

Route::group(['prefix' => 'directorio'], function() {
    
    Route::get('/', 'DirectorioController@index');
    Route::get('empresa', function(){
        return view('egresados.directorio.datos');
    });
    Route::get('empresa/comentarios', function(){
        return view('egresados.directorio.comentarios');
    });
    Route::get('empresa/ofertas', function(){
        return view('egresados.directorio.ofertasLaborales');
    });

});

Route::get('/ranking', function() {
    return view('egresados.ranking');
});

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



// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


//Rutas para la seccion de Administrador@
Route::group(['prefix' => 'admin'], function() {
    Route::get('/crearAlumno', function(){
        return view('admin.Alumnos.CrearAlumno');
    });
    Route::get('editarAlumno', function(){
        return view('admin.Alumnos.EditarAlumno');
    });
    Route::get('crearEmpresa', function(){
        return view('admin.Empresa.CrearEmpresa');
    });
    Route::get('editarEmpresa', function(){
        return view('admin.Empresa.EditarEmpresa');
    });
});

