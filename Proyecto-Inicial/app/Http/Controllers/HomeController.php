<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Can acces to the method's class if authenticated 
        $this->middleware('auth');
    }

    public function index()
    {
        // Return view home egresados
        return view('egresados.home');
    }
}
