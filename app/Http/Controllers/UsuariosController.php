<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function insert(Request $request, Usuario $usuario)
    {
        // Cria o usuario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:usuarios',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);
        $usuario->fill($request->all()); // Usei mass assignment do laravel pra isso
        $usuario->save();

        return redirect()->route('login')->withInput(['username' => $usuario->username]); // Envio o input de username de volta pro frontend para ele ja ficar preenchido
    }
  

    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        // Tenta o login
        if (!Auth::attempt($credenciais)) {
            return redirect()->route('login')->withInput(['error' => 'Usuário ou senha inválidos.']);
        }

        session()->regenerate();
        return redirect()->route('home');
    }

    public function logout()
    {
        // Desloga o usuario
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    }
}
