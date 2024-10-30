<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'required|image|max:2048', // Validación de imagen
            'stock' => 'required|integer',
            'precio' => 'required|numeric|between:0,999999.99',
            'descripcion' => 'nullable|string',
        ]);

        // Guarda la imagen en public/imagenes
        $imagePath = $request->file('imagen')->store('imagenes', 'public');

        // Crea un nuevo producto con la ruta de la imagen
        Product::create([
            'nombre' => $request->nombre,
            'imagen' => $imagePath, // Guarda la ruta de la imagen
            'stock' => $request->stock,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.productos')->with('success', 'Producto creado con éxito.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048', // La imagen es opcional al actualizar
            'stock' => 'required|integer',
            'precio' => 'required|numeric|between:0,999999.99',
            'descripcion' => 'nullable|string',
        ]);
    
        $product = Product::findOrFail($id);
        $product->nombre = $request->nombre;
        $product->stock = $request->stock;
        $product->precio = $request->precio;
        $product->descripcion = $request->descripcion;
    
        // Si se ha subido una nueva imagen
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($product->imagen) {
                Storage::disk('public')->delete($product->imagen);
            }
    
            // Guarda la nueva imagen en public/imagenes
            $imagePath = $request->file('imagen')->store('imagenes', 'public');
            $product->imagen = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('admin.productos')->with('success', '¡Producto actualizado con éxito!');
    }
    

    public function destroy(Product $product)
    {
        try {
            // Elimina la imagen del almacenamiento si existe
            if ($product->imagen) {
                Storage::disk('public')->delete($product->imagen); // Eliminar la imagen de la carpeta 'imagenes'
            }

            // Elimina el producto
            $product->delete();

            return redirect()->route('admin.productos')->with('success', 'Producto eliminado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('admin.productos')->with('error', 'Error al eliminar el producto: ' . $e->getMessage());
        }
    }
}
