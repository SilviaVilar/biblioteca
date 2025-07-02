<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function loginForm()
    {
        //mostramos la vista de login
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('login', 'password');
        if (Auth::attempt($credenciales)) {
            // Autenticación exitosa, le mostramos la página inicial de libros
            return redirect()->intended(route('libros.index'));
        } else {
            $error = 'Usuario incorrecto';
            //mostramos el formulario de login con el error
            return view('auth.login', compact('error'));
        }
    }

    public function logout()
    {
        Auth::logout();
        //Renderizar la vista deseada, en nuestro caso la de login
        return view('auth.login');
    }
}
