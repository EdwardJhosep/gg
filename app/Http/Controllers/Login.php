<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'dni' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Obtener el empleado por el DNI
        $empleado = Empleado::where('dni', $request->input('dni'))->first();
    
        // Comprobar si el empleado existe y si la contraseña es correcta
        if ($empleado && Hash::check($request->input('password'), $empleado->password)) {
            // Iniciar sesión
            Auth::login($empleado);
    
            // Generar un token y guardarlo en el empleado
            $token = bin2hex(random_bytes(30)); // Genera un token aleatorio
            $empleado->token = $token; // Asigna el token al empleado
            $empleado->save(); // Guarda el token en la base de datos
    
            // Guardar el token en la sesión
            session(['token' => $token]);
    
            // Redirigir según el tipo de empleado
            if ($empleado->tipo === 'Administrador') {
                return redirect()->route('admin.home')->with('success', 'Bienvenido, administrador.'); // Mensaje de éxito
            } else {
                return redirect()->route('empleado.home')->with('success', 'Bienvenido, empleado.'); // Mensaje de éxito
            }
        }
    
        // Si las credenciales son incorrectas
        return back()->withErrors([
            'dni' => 'Las credenciales proporcionadas son incorrectas.',
            'password' => 'Asegúrate de que tu contraseña sea correcta.',
        ])->withInput($request->only('dni')); // Mantiene la entrada anterior
    }
 }


    

