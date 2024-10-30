<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Empleado; // Asegúrate de que esta línea esté presente
use App\Models\Venta; // Asegúrate de tener un modelo Venta
use Illuminate\Support\Facades\Auth; // Asegúrate de que esta línea esté presente
use Illuminate\Support\Facades\Http; // Importar la clase Http

class MenuAdmin extends Controller
{
    public function index()
    {
        // Recuperar todos los productos, ventas y empleados
        $productos = Product::all();
        $ventas = Venta::with('product')->get(); // Usamos with para cargar la relación
        $empleados = Empleado::all(); // Recuperar todos los empleados

        // Pasar los datos a la vista
        return view('admin.home', compact('productos', 'ventas', 'empleados'));
    }


    public function producto()
    {
        // Obtén todos los productos
        $products = Product::all(); // Cambia esto si necesitas algún filtro

        // Pasa los productos a la vista
        return view('admin.productos', compact('products'));
    }
    public function empleados()
    {
        // Obtener empleados desde tu base de datos
        $empleados = Empleado::all();

        // Obtener datos de RENIEC para cada empleado
        foreach ($empleados as $empleado) {
            $empleado->datos_reniec = $this->consultarReniec($empleado->dni);
        }

        return view('admin.empleados', compact('empleados'));
    }

    private function consultarReniec($dni)
    {
        // Aquí se realiza la consulta a la API de RENIEC
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer apis-token-9121.qz-SBRzAN1zWNGrA1wYw6l2Dg7uatxrU',
            ])->get("https://api.apis.net.pe/v2/reniec/dni?numero={$dni}");

            if ($response->successful()) {
                return $response->json(); // Retorna los datos obtenidos
            } else {
                return ['error' => 'Error al obtener datos de RENIEC: ' . $response->status()];
            }
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function ventas()
    {
        $ventas = Venta::with('product')->get(); // Obtén todas las ventas con el producto relacionado
    
        return view('admin.ventas', compact('ventas')); // Pasa las ventas a la vista
    }
    


    public function logout()
    {
        Auth::logout(); // Cierra la sesión del usuario autenticado
        session()->forget('token'); // Eliminar el token de la sesión
        return view('welcome'); // Redirige a la página de inicio de sesión
    }
}
