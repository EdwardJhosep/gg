<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Empleado; // Asegúrate de que esta línea esté presente
use App\Models\Venta; // Asegúrate de tener un modelo Venta


class MenuEmpleado extends Controller
{
    public function index()
    {
        $ventas = Venta::with('product')->get(); // Obtén todas las ventas con el producto relacionado
    
        return view('empleado.home', compact('ventas')); // Pasa las ventas a la vista
    }
    
    public function logout()
    {
        Auth::logout(); // Cierra la sesión del usuario autenticado
        session()->forget('token'); // Eliminar el token de la sesión
        return view('vistacliente.login'); // Redirige a la página de inicio de sesión
    }
}
