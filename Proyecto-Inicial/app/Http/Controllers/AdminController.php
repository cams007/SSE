<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Egresado;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $egresados = Egresado::where('habilitado','=',1)
            ->orderBy('ap_paterno', 'DESC')
            ->paginate(10);

        // return view('admin.egresado.index'); //change for admin/home
        return view('admin.egresado.index', compact('egresados'));
    }
}