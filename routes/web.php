<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VendedorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/Clientes', function () {
    return view('Cliente');
});
Route::get('clientes/list', [ClienteController::class, 'obtenerClientes']);
Route::get('clientes/{codCliente}', [ClienteController::class, 'obtenerCliente']);
Route::post('clientes/save', [ClienteController::class, 'guardarCliente']);
Route::post('clientes/delete/{codCliente}', [ClienteController::class, 'eliminar']);
Route::post('clientes/update', [ClienteController::class, 'editar']);

//productos
Route::get('/Productos', function () {
    return view('Producto');
});
Route::get('productos/list', [ProductoController::class, 'obtenerProductos']);
Route::get('productos/{codProducto}', [ProductoController::class, 'obtenerProducto']);
Route::post('productos/save', [ProductoController::class, 'guardarProducto']);
Route::post('productos/delete/{codCliente}', [ProductoController::class, 'eliminar']);
Route::post('productos/update', [ProductoController::class, 'editar']);

//venta
Route::get('/Venta', function () {
    return view('Venta');
});


//vendedor
Route::get('/Vendedor', function () {
    return view('Vendedor');
});
Route::get('vendedores/list', [VendedorController::class, 'obtenerVendedores']);