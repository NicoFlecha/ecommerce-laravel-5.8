<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function editarPerfil(){
      $user= Auth::user();
      return view('perfilEditar');
    }

    public function actualizar(request $req){
      $user= Auth::user();
      if ($req->username) {
        $user->username = $req->username;
      }
      $user->email = $req->email;
      if ($req->password) {
        $user->password = Hash::make($req->password);
      }
      if ($req->avatar) {
        $user->avatar = $req->avatar;
      }
      $user->save();

      return view('perfil');
    }
}
