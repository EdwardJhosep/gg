<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuCliente extends Controller
{
    public function index()
    {
        return view('welcome'); // Página de inicio
    }

    public function productos()
    {
        return view('vistacliente.productos'); // Página de productos
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