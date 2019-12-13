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
      $user->username = $req->username;
      $user->email = $req->email;
      $user->password = Hash::make($req->password);
      $user->avatar = $req->avatar;
      $user->save();

      return view('perfil');
    }
}
