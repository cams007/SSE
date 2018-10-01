<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/bienvenida';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data )
    {
        return Validator::make($data, [
            'egresado_matricula' => 'required|min:10|max:10',
            'correo' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed|unique:users'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // $egresado = egresado::where('matricula', $data['matricula'])->first();

        return User::create( [
            'correo' => $data['correo'],
            'password' => bcrypt( $data[ 'password' ] ),
            'egresado_matricula' => $data[ 'egresado_matricula' ],
        ]);
    }
}
