<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresado;
use App\Preparacion;
use App\Maestria;
use App\Doctorado;

class PerfilController extends Controller {

    public function saveDatosB(Request $request) {

        $egresado = Egresado::find(2008040046);
        $egresado->telefono = $request->egresadosTel;
        $egresado->lugar_actual = $request->cActual;
        $egresado->correo = $request->egresadosEmail;
        $egresado->save();

        return redirect('perfil/fpersonal');
    }

    public function saveFormacionPerson(Request $request) {
        $p = 
        // return redirect('perfil/experiencia');
    }

    public function savePrimerEmp(Request $request) {
    	return redirect('perfil/dprofesional');
    }

    public function saveFormacionProf(Request $request) {
    	return redirect('perfil/fprofesional');
    }
}
