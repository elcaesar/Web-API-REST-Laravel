<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;


class LoginController extends Controller
{
   public function login()
   {
      $credentials = $this->validate(request(),[
          'email'    => 'email|required|string',
          'password' => 'required|string'
      ]); 

      
      // se intentará iniciar sesión pasando las credenciales
      if(Auth::attempt($credentials))
      {
          return redirect('home');
      }
      return back()->withErrors(['email' => 'Estas credenciales no concuerdan con nuestros registros']);
   }

  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function logout()
  {
      Auth::logout();
      return redirect('home');
  }  

}

