<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\UsersNewsletter;

class EmailController extends Controller
{
    public function suscripcionNewsletter(Request $request)
    {
      //Verificar si no hay otro correo igual en la BD
      $this->validate($request,
      [
        'emailAEnviar' => 'required|email:rfc|unique:users_newsletter,user_email',
      ],
      [
        'emailAEnviar.required' => 'El campo no puede estar vacío',
        'emailAEnviar.email' => 'El email no es valido',
        'emailAEnviar.unique' => 'El email ya existe en nuestra Base de Datos.',
      ]);
      //Se especifíca el asunto y a quien se va a enviar el email
      $asunto = "Bienvenido a nuestro Newsletter";
      $para = $request->emailAEnviar;
        //Función send para enviar el correo, el mensaje está en email.blade.php
        Mail::send('email',$request->all(), function($msj) use($asunto,$para){
            $msj->from("fueguitosa@gmail.com","Fueguito SA");
            $msj->subject($asunto);
            $msj->to($para);
        });
          $userNewsletter = new UsersNewsletter();
          $userNewsletter->user_email = $request['emailAEnviar'];
          $userNewsletter->save();
      //Redirecciona al index
      return redirect()->back();
    }
}
