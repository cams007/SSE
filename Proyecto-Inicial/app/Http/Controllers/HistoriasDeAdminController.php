<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoriaExito;

class HistoriasDeAdminController extends Controller
{
       //Metodo para mostrar en el 
    public function indexH(Request $request){
        
        $historias = HistoriaExito::titulo($request->get('q'))->orderBy('created_at', 'DESC')->paginate(10);

        return view('Admin.historiasDe.index', compact('historias'));
    }

    public function showCrearHistoria(Request $request){

        return view('Admin.historiasDe.crearHistoriaDe');//accedemos alarchivo
    }
}
