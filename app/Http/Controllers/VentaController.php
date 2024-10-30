<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta; // Asegúrate de tener un modelo Venta
use App\Models\Product; // Cambia Producto a Product

class VentaController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'dni' => 'required|string|max:20',
            'product_id' => 'required|exists:products,id',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);
    
        // Obtener el producto
        $producto = Product::findOrFail($request->product_id);
    
        // Verificar si hay suficiente stock
        if ($producto->stock < $request->cantidad) {
            return redirect()->route('productos')->withErrors([
                'cantidad' => 'No hay suficiente stock para completar la venta.'
            ])->withInput(); // Redirigir con errores y mantener la entrada anterior
        }
    
        // Crear la venta
        Venta::create([
            'dni' => $request->dni,
            'product_id' => $request->product_id,
            'cantidad' => $request->cantidad,
            'total' => $request->total,
            'estado' => 'pendiente', // Establecer el estado como 'pendiente'
        ]);
    
        // Descontar el stock del producto
        $producto->stock -= $request->cantidad;
        $producto->save(); // Guardar el cambio en la base de datos
    
        return redirect()->route('productos')->with('success', 'Venta creada exitosamente.');
    }
    
    public function buscarVenta(Request $request) {
        $dni = $request->input('dni');
        
        // Busca las ventas relacionadas con el DNI
        $ventas = Venta::where('dni', $dni)->with('product')->get(); // Asegúrate de tener la relación en tu modelo
        
        // Retorna la vista con los resultados
        return view('welcome', compact('ventas'));
    }
    public function confirmarVenta($id)
{
    // Buscar la venta por ID
    $venta = Venta::findOrFail($id);
    
    // Cambiar el estado a 'confirmado'
    $venta->estado = 'confirmado';
    
    // Guardar los cambios en la base de datos
    $venta->save();
    
    // Redirigir con un mensaje de éxito
    return redirect()->route('admin.ventas')->with('success', 'Venta confirmada exitosamente.');
}

    
}
