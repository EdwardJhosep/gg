<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MenuAdmin extends Controller
{
    public function index()
    {
        return view('admin.home'); 
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
        return view('admin.empleados'); 
    }
    public function ventas()
    {
        return view('admin.ventas'); 
    }
}
