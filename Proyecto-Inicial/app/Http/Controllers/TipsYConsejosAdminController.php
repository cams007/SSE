<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tip;

class TipsYConsejosAdminController extends Controller
{
    public function index(Request $request){

    	$tips = Tip::titulo($request->get('q'))->orderBy('created_at', 'DESC')->paginate(10);

        return view('Admin.tipYconsejo.index', compact('tips'));
    }

    public function showCreateTip(Request $request){

    	return view('Admin.tipYconsejo.crearTip');//accedemos al archivo
    }
}
