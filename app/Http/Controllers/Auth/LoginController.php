<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use App\User;
use Illuminate\Support\Facades\Hash;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
      return view('login');
    }

    public function redirectToGoogle()
    {
        // Pido la información del usuario
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // recibo la indo y la almaceno en una variable
        $userGoogleRaw = Socialite::driver('google')->user();
        // obtengo los datos del usuario en formato de Array
        $userGoogle = $userGoogleRaw->user;
        // verifico en la base de datos si existe algún usuario con el mismo email
        $user = User::where('email', $userGoogle['email'])->first();
        //sí no existe, creo un nuevo usuario y lo guardo en la BBDD
        if (!$user)
        {
          $user = new User;
          $user->email = $userGoogle['email'];
          $user->name = $userGoogle['given_name'];
          $user->apellido = $userGoogle['family_name'];
          // se le asigna una contraseña random
          $user->password = Hash::make('12345678');
          $user->save();
        }
        // si no existe se crea un nuevo usuario y se lo loguea, en el caso que ya exista directamente se lo loguea
        \Auth::login($user);
        // luego redirijo hacio donde quiera
        return redirect('/');
    }
}
