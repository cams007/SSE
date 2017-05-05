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

use App\Note;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('perfil.index', compact('notes'));
});
