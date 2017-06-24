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
    return view('index');
});
Route::get('/home', function () {
    return view('registro.home');
});

Route::group(['prefix' => 'perfil'], function() {
    
    Route::get('/' , function () {
        return view('perfil.index', ['egresados' => App\Egresado::find(2008040046)]);
    });
    Route::get('fpersonal', function() {
        return view('perfil.fPersonal');
    });
    Route::get('experiencia', function() {
        return view('perfil.experiencia');
    });
    Route::get('dprofesional', function() {
        return view('perfil.dprofesional');
    });
    
    Route::get('fprofesional', function() {
        return view('perfil.fProfesional', array('dato' => 'No'));
    });
    Route::get('intereses', function() {
        return view('perfil.intereses');
    });
    Route::get('ofertaslab', function() {
        return view('perfil.ofertaslab');
    });
    
    Route::post('/', 'PerfilController@saveDatosB');
    Route::post('fpersonal', 'PerfilController@saveFormacionPerson');
    Route::post('experiencia', 'PerfilController@savePrimerEmp');
    Route::post('intereses', 'PerfilController@saveFormacionProf');
});

Route::group(['prefix' => 'directorio'], function() {
    
    Route::get('/', function() {
        return view('directorio_empresa.index');
    });

    Route::get('empresa', function(){
        return view('directorio_empresa.datos');
    });

    Route::get('empresa/comentarios', function(){
        return view('directorio_empresa.comentarios');
    });

    Route::get('empresa/ofertas', function(){
        return view('directorio_empresa.ofertasLaborales');
    });

});

Route::get('/registro', function() {
    return view('registro.registrarse');
});


Route::get('/tabuladorSalarios', function(){
	return view('egresados.TabuladorSalarios');
});

Route::get('/eventosUTM', function(){
	return view('egresados.eventosUTM.eventosUTM-index');
});

Route::get('eventosUTM/culturales', function(){
	return view('egresados.eventosUTM.Culturales');
});

Route::get('eventosUTM/academicos', function(){
    return view('egresados.eventosUTM.Academicos');
});

Route::get('/historiasdeExito', function(){
    return view('egresados.HistoriasDeExito');
});

Route::get('/tipsConsejos', function(){
    return view('egresados.TipsConsejos');
});

Route::get('/ranking', function() {
	return view('ranking.ranking');
});

Route::get('/ofertas', function() {
	return view('ofertas.ofertas');
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');