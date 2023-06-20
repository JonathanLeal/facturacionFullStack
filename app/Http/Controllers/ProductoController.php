<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function obtenerProductos(){
        $productos = Producto::all();
        if (count($productos) == 0) {
            return response()->json(['mensaje' => 'No hay productos registrados'], 404);
        }
        return response()->json($productos);
    }

    public function obtenerProducto($codCliente){
        $id = Producto::find($codCliente);
        if (!$id) {
            return response()->json(['mensaje' => 'No se encontro el producto'], 404);
        }
        return response()->json($id);
    }

    public function guardarProducto(Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string',
            'precioVenta' => 'required|numeric',
            'stockMinimo' => 'required|integer',
            'stockActual' => 'required|integer',
            'codBarro' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 404);
        }

        DB::beginTransaction();
        try {
            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->precioVenta = $request->precioVenta;
            $producto->stockMinimo = $request->stockMinimo;
            $producto->stockActual = $request->stockActual;
            $producto->codBarra = $request->codBarra;
            $producto->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Producto guardado con exito'], 200);
    }

    public function eliminar($codCliente){
        $id = Producto::find($codCliente);
        if (!$id) {
            return response()->json(['mensaje' => 'No se encontro el Producto'], 404);
        }
        $id->delete();
        return response()->json(['mensaje' => 'Producto eliminado con exito'], 200);
    }

    public function editar(Request $request){
        $validator = Validator::make($request->all(),[
            'codCliente' => 'integer',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'direccion' => 'required|string',
            'cod_cliente' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 404);
        }

        $id = Producto::find($request->codCliente);
        if (!$id) {
            return response()->json(['mensaje' => 'No se encontro el Producto'], 404);
        }

        DB::beginTransaction();
        try {
            $id->nombre = $request->nombre;
            $id->precioVenta = $request->precioVenta;
            $id->stockMinimo = $request->stockMinimo;
            $id->stockActual = $request->stockActual;
            $id->codBarra = $request->codBarra;
            $id->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Producto editado con exito'], 200);
    }
}