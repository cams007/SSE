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

Route::group(['prefix' => 'perfil'], function() {
    
    Route::get('/' , function () {
        return view('perfil.index');
    });

    Route::get('fpersonal', function() {
        return view('perfil.fPersonal');
    });

    Route::get('experiencia', function() {
        return view('perfil.experiencia');
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
Route::get('/registro', function() {
    return view('registro.registrarse');
});

Route::get('/inicio', function() {
    return view('registro.home');
});
Route::get('/bienvenida', function() {
    return view('registro.bienvenida');
});

Route::get('perfil/dprofesional', function() {
    return view('perfil.dprofesional');
});

Route::get('perfil/fprofesional', function() {
    return view('perfil.fProfesional', array('dato' => 'No'));
});

Route::get('perfil/egresadoReco', function() {
    return view('perfil.recomendaciones');
});
           
Route::get('/tabuladorSalarios', function(){
	return view('egresados.TabuladorSalarios');
});

Route::get('/eventosUTM', function(){
	return view('egresados.eventosUTM.index');
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

Route::get('/directorio_empresas', function() {
	return view('empresa.directorio');
});

Route::get('/datos_empresa', function(){
    return view('empresa.index');
});

Route::get('datos_empresa/comentarios', function(){
    return view('empresa.comentarios');
});

Route::get('datos_empresa/ofertas', function(){
    return view('empresa.ofertasLaborales');
});

Route::get('perfil/propuesta', function(){
    return view('perfil.fProfesional_propuesta', array('dato' => 'No'));
});
