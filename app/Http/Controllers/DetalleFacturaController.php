<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleFactura;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DetalleFacturaController extends Controller
{
   public function listarClientes(){
    $clientes = DB::table('cliente AS c')
                    ->select('c.codCliente', 'c.nombres')
                    ->get();
    return response()->json($clientes);
   }

   public function listarProductos(){
    $productos = DB::table('producto AS p')
                    ->select('p.codProducto', 'p.nombreProducto')
                    ->get();
    return $productos;
   }

   public function listarDetalle(Request $request){
    $validator = Validator::make($request->all(), [
        'codCliente' => 'required',
        'codProducto' => 'required',
        'cantidad' => 'required|integer',
        'fechaIngreso' => 'required|date'
    ]);

    if ($validator->fails()) {
        return response()->json(['mensaje' => $validator->errors()], 422);
    }

    if ($request->cantidad <= 0) {
        return response()->json(['mensaje' => 'La cantidad no puede ser 0'], 422);
    }

    $cliente = Cliente::where('codCliente', $request->codCliente)->first();
    if (!$cliente) {
        return response()->json(['mensaje' => 'el cliente no fue encontrado']);
    }

    $producto = Producto::where('codProducto', $request->codProducto)->first();
    if (!$producto) {
        return response()->json(['mensaje' => 'el producto no fue encontrado']);
    }

    DB::beginTransaction();
    try {
        $detalle = new DetalleFactura();
        $detalle->codFactura = 1;
        $detalle->codProducto = $producto->codProducto;
        $detalle->codBarra = $producto->codBarra;
        $detalle->nombreProducto = $producto->nombreProducto;
        $detalle->cantidad = $request->cantidad;
        $detalle->precioVenta = $producto->precioVenta;
        $detalle->total = $request->cantidad * $producto->precioVenta;
        $detalle->save();
    } catch (\Throwable $th) {
        DB::rollBack();
        return response()->json(['mensaje' => $th->getMessage()]);
    }
    DB::commit();
    return response()->json(['mensaje'=>'detalle listado con exito']);
   }

   public function ventaListada(){
     
   }
}
