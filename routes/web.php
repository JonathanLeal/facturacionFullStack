<?php

use App\Http\Controllers\ClienteController;
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
Route::get('productos/list', [ClienteController::class, 'obtenerProducto']);
Route::get('productos/{codCliente}', [ClienteController::class, 'obtenerProducto']);
Route::post('productos/save', [ClienteController::class, 'guardarProducto']);
Route::post('productos/delete/{codCliente}', [ClienteController::class, 'eliminar']);
Route::post('productos/update', [ClienteController::class, 'editar']);