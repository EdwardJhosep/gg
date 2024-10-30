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
        ]);
    
        // Obtener el producto
        $producto = Product::findOrFail($request->product_id);
    
        // Verificar si hay suficiente stock
        if ($producto->stock < $request->cantidad) {
            return redirect()->route('productos')->withErrors([
                'cantidad' => 'No hay suficiente stock para completar la venta.'
            ])->withInput(); // Redirigir con errores y mantener la entrada anterior
        }
    
        // Calcular el total
// Obtener el precio del producto
$precio = $producto->precio; // Asegúrate de que el producto tenga este campo

// Calcular el total
$total = $precio * $request->cantidad;

// Validar el total antes de insertarlo en la base de datos
if ($total > 9999999999999.99) {
    return redirect()->route('productos')->withErrors([
        'total' => 'El valor total es demasiado alto.'
    ])->withInput(); // Redirigir con errores y mantener la entrada anterior
}


        // Crear la venta
        Venta::create([
            'dni' => $request->dni,
            'product_id' => $request->product_id,
            'cantidad' => $request->cantidad,
            'total' => $total, // Asignar el total calculado
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
    // eliminar
    public function destroy($id)
    {
        try {
            // Buscar la venta por ID
            $venta = Venta::findOrFail($id);
    
            // Obtener el producto asociado a la venta
            $producto = Product::findOrFail($venta->product_id);
    
            // Sumar la cantidad de la venta al stock del producto
            $producto->stock += $venta->cantidad;
            $producto->save(); // Guardar los cambios en el stock
    
            // Eliminar la venta de la base de datos
            $venta->delete();
    
            // Redirigir con un mensaje de éxito
            return redirect()->route('empleado.home')->with('success', 'Venta eliminada exitosamente. El stock del producto ha sido actualizado.');
        } catch (\Exception $e) {
            // Redirigir con un mensaje de error
            return redirect()->route('empleado.home')->with('error', 'Error al eliminar la venta: ' . $e->getMessage());
        }
    }


}
