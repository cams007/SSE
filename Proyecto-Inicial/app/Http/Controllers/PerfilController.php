<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresado;
class PerfilController extends Controller {

    public function saveDatosB(Request $request) {

        $egresado = Egresado::find(2008040046);
        $egresado->telefono = $request->egresadosTel;
        $egresado->lugar_actual = $request->cActual;
        $egresado->correo = $request->egresadosEmail;
        $egresado->save();

        redirect('perfil/fpersonal');
    }

    public function saveFormacionPerson(Request $request) {
    	return redirect('perfil/experiencia');
    }

    public function savePrimerEmp(Request $request) {
    	return redirect('perfil/dprofesional');
    }

    public function saveFormacionProf(Request $request) {
    	return redirect('perfil/fprofesional');
    }
}
