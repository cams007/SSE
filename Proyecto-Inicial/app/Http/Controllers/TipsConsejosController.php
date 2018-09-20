<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tip;

class TipsConsejosController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tips = Tip::titulo($request->get('q'))->orderBy('created_at', 'DESC')->paginate(4);

        return view('egresados.tipsConsejos', compact('tips'));
    }
}
