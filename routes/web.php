<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuCliente;
use App\Http\Controllers\Login;
use App\Http\Controllers\MenuAdmin;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MenuEmpleado;
use App\Http\Controllers\VentaController;





Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [MenuCliente::class, 'index'])->name('inicio');
Route::get('/productos', [MenuCliente::class, 'productos'])->name('productos');
Route::get('/nosotros', [MenuCliente::class, 'nosotros'])->name('nosotros');
Route::get('/login', [MenuCliente::class, 'login'])->name('login');

Route::post('/login', [Login::class, 'login'])->name('loginAdmin');

Route::get('/admin/home', [MenuAdmin::class, 'index'])->name('admin.home');
Route::get('/admin/productos', [MenuAdmin::class, 'producto'])->name('admin.productos');
Route::get('/admin/empleados', [MenuAdmin::class, 'empleados'])->name('admin.empleados');
Route::get('/admin/ventas', [MenuAdmin::class, 'ventas'])->name('admin.ventas');
Route::post('/', [MenuAdmin::class, 'logout'])->name('admin.logout'); // Esta es la línea que necesitas
Route::post('/', [MenuAdmin::class, 'logout'])->name('empleado.logout'); // Esta es la línea que necesitas



Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/productos/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Eliminar producto

Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');

Route::get('/empleado/home', [MenuEmpleado::class, 'index'])->name('empleado.home');

Route::post('/ventas/store', [VentaController::class, 'store'])->name('ventas.store');

Route::get('/buscar-venta', [VentaController::class, 'buscarVenta'])->name('buscar.venta');

Route::post('/ventas/confirmar/{id}', [VentaController::class, 'confirmarVenta'])->name('confirmar_venta');

Route::post('/ventas/eliminar/{id}', [VentaController::class, 'destroy'])->name('eliminar_venta');
