<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller {

    public function saveDatosB(Request $request) {
    	return redirect('perfil/fpersonal');
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
