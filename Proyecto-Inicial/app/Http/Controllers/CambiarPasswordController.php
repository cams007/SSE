<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Empresa;
use App\Contacto;
use App\Ranking;
use App\Egresado;
use App\Oferta;
use App\User;
use Auth;
use Session;

class CambiarPasswordController extends Controller
{
      /**
      * Create a new controller instance.
      *
      * @return void
      **/
      public function __construct()
      {
            $this->middleware('auth');
      }

      public function showChangeForm(Request $request)
      {
            return view('auth.passwordchange' );
      }

      public function confirmNewPassword( Request $request )
      {
            $user = Auth::user();

            if( Hash::check( $request->passwordold, Auth::user()->password ) && $request->password == $request->password_confirmation )
            {
                  DB::beginTransaction();
                  try
                  {
                        $user->password = bcrypt( $request->password );
                        $user->save();
                  }
                  catch( Exception $e )
                  {
                        DB::rollback();
                        echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                        Session::flash('message_danger', 'Error al momento de actualizar la contraseña. Intente nuevamente.');
           
                        return redirect( 'change/password' );
                  }
                  DB::commit();
                  Session::flash('message_success', 'Contraseña guardada correctamente.');
                  
                  return redirect( '/home' );
            }
            Session::flash('message_danger', 'Verifique que su contraseña sea correcta.');
            
            return redirect( 'change/password' );
      }
}
