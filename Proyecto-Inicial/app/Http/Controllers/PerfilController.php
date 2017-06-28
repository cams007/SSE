<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresado;
use App\User;
use App\Preparacion;
use App\Maestria;
use App\Doctorado;

class PerfilController extends Controller {

    public function saveDatosB(Request $request) {

        $egresado = Egresado::where('nacionalidad', '<>', null)->first();
        $egresado->telefono = $request->egresadosTel;
        $egresado->direccion_actual = $request->cActual;
        $egresado->usuario->correo = $request->egresadosEmail;
        $egresado->save();
        $egresado->usuario->save();
        
        return redirect('perfil/fpersonal');
    }

    public function saveFormacionPerson(Request $request) {
        // $p = 
        return redirect('perfil/experiencia');
    }

    public function savePrimerEmp(Request $request) {
    	return redirect('perfil/dprofesional');
    }

    public function saveFormacionProf(Request $request) {
    	return redirect('perfil/fprofesional');
    }
}
