<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    /**
     * Exibe o formulário de login para os técnicos.
     */
    public function showLoginForm()
    {
        return view('auth.tecnico-login'); // Página de login dos técnicos
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redireciona para a rota do calendário após login
            return redirect()->route('calendario');
        }

        // Em caso de erro, retorna com uma mensagem de erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('tecnico.login');
    }
}
