<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|numeric|unique:empleados,dni',
            'tipo' => 'nullable|string|max:255',
        ]);
    
        // Crear la contraseña automática
        $password = $request->dni . 'hilorojo@2024';
    
        Empleado::create([
            'dni' => $request->dni,
            'tipo' => $request->tipo ?? 'Cajero', 
            'password' => Hash::make($password), // Asegúrate de encriptar la contraseña
        ]);
    
        return redirect()->back()->with('success', 'Empleado agregado exitosamente.');
    }
    
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->back()->with('success', 'Empleado eliminado exitosamente.');
    }
    
}
