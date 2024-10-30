<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Empleado; // Asegúrate de que esta línea esté presente
use App\Models\Venta; // Asegúrate de tener un modelo Venta
use Carbon\Carbon; // Asegúrate de importar Carbon

class MenuEmpleado extends Controller
{
    public function index()
    {
        // Llama a la función que elimina las ventas antiguas
        $this->eliminarVentasAntiguas(); // Elimina ventas pendientes que tengan más de 7 días

        $ventas = Venta::with('product')->get(); // Obtén todas las ventas con el producto relacionado
    
        return view('empleado.home', compact('ventas')); // Pasa las ventas a la vista
    }
    
    public function logout()
    {
        Auth::logout(); // Cierra la sesión del usuario autenticado
        session()->forget('token'); // Eliminar el token de la sesión
        return view('welcome'); // Redirige a la página de inicio de sesión
    }

    // Función para eliminar ventas pendientes antiguas
    public function eliminarVentasAntiguas()
    {
        // Calcular la fecha límite (hace 7 días)
        $fechaLimite = Carbon::now()->subDays(7);
        
        // Eliminar las ventas que sean anteriores a la fecha límite y tengan estado 'pendiente'
        $ventasEliminadas = Venta::where('created_at', '<', $fechaLimite)
                                  ->where('estado', 'pendiente')
                                  ->delete();
        
        // Opcional: puedes almacenar un mensaje en la sesión o registrar el número de ventas eliminadas
        // return redirect()->route('empleado.home')->with('success', "$ventasEliminadas ventas pendientes eliminadas exitosamente.");
    }
}
