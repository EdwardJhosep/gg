<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{


    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'dni' => 'required|string',
            'password' => 'required|string',
        ]);

        // Datos de inicio de sesión
        $credentials = [
            'dni' => $request->input('dni'),
            'password' => $request->input('password'),
        ];

        // Comprobar si las credenciales son correctas
        if ($credentials['dni'] === '75902205' && $credentials['password'] === 'edward@75902205') {
            // Iniciar sesión
            Auth::loginUsingId(1); // Cambia el 1 por el ID del usuario en tu base de datos si es necesario
            return redirect()->route('admin.home'); // Redirige a la ruta deseada
        }

        // Si las credenciales son incorrectas
        return back()->withErrors([
            'dni' => 'Las credenciales proporcionadas son incorrectas.',
        ])->withInput($request->only('dni'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('vistacliente.login'); // Cambia esto a tu ruta de inicio de sesión
    }
}
