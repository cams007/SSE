<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\User;
use Auth;
use Session;

class CambiarPasswordAdminController extends Controller
{
      /**
      * Create a new controller instance.
      *
      * @return void
      **/
      public function __construct()
      {
            $this->middleware('auth:admin');
      }

      public function showChangeForm(Request $request)
      {
            return view('admin.passwordchange' );
      }

      public function confirmNewPassword( Request $request )
      {
            $user = Admin::find( Auth::user()->id );

            if( Hash::check( $request->passwordold, $user->password ) && $request->password == $request->password_confirmation )
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
           
                        return redirect( 'change/password/admin' );
                  }
                  DB::commit();
                  Session::flash('message_success', 'Contraseña guardada correctamente.');
                  
                  return redirect( 'admin/home/' );
            }
            Session::flash('message_danger', 'Verifique que su contraseña sea correcta.');
            
            return redirect( 'change/password/admin' );
      }
}
