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

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048', // Cambiar a nullable si no se requiere una nueva imagen
            'stock' => 'required|integer',
            'precio' => 'required|numeric|between:0,999999.99',
            'descripcion' => 'nullable|string',
        ]);

        // Si se proporciona una nueva imagen, se guarda
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('imagenes', 'public');
            // Eliminar la imagen anterior si existe
            if ($product->imagen) {
                Storage::disk('public')->delete($product->imagen);
            }
            $product->imagen = $imagePath; // Actualizar la ruta de la imagen
        }

        $product->update($request->only(['nombre', 'stock', 'precio', 'descripcion']));

        return redirect()->route('admin.productos')->with('success', 'Producto actualizado con éxito.');
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
