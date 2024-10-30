<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MenuCliente extends Controller
{
    public function index()
    {
        return view('welcome'); // Página de inicio
    }

    public function productos()
    {
        $products = Product::all(); 

        return view('vistacliente.productos', compact('products'));
    }

    public function nosotros()
    {
        return view('vistacliente.nosotros'); // Página acerca de nosotros
    }

    public function login()
    {
        return view('vistacliente.login'); // Página de login
    }

}