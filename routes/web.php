<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuCliente;
use App\Http\Controllers\Login;
use App\Http\Controllers\MenuAdmin;
use App\Http\Controllers\ProductController;




Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [MenuCliente::class, 'index'])->name('inicio');
Route::get('/productos', [MenuCliente::class, 'productos'])->name('productos');
Route::get('/nosotros', [MenuCliente::class, 'nosotros'])->name('nosotros');
Route::get('/login', [MenuCliente::class, 'login'])->name('login');

Route::post('/logout', [Login::class, 'logout'])->name('logout');
Route::post('/login', [Login::class, 'login'])->name('loginAdmin');

Route::get('/admin/home', [MenuAdmin::class, 'index'])->name('admin.home');
Route::get('/admin/productos', [MenuAdmin::class, 'producto'])->name('admin.productos');
Route::get('/admin/empleados', [MenuAdmin::class, 'empleados'])->name('admin.empleados');
Route::get('/admin/ventas', [MenuAdmin::class, 'ventas'])->name('admin.ventas');


Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
Route::get('/productos/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Ruta de edición
Route::delete('/productos/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Eliminar producto
