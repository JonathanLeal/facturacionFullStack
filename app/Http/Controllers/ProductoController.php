<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
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
            'nombreProducto' => 'required|string',
            'precioVenta' => 'required|numeric',
            'stockMinimo' => 'required|integer',
            'stockActual' => 'required|integer',
            'codBarra' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 404);
        }

        DB::beginTransaction();
        try {
            $producto = new Producto();
            $producto->nombreProducto = $request->nombreProducto;
            $producto->precioVenta = $request->precioVenta;
            $producto->stockMinimo = $request->stockMinimo;
            $producto->stockActual = $request->stockActual;
            $producto->codBarra = $request->codBarra;

            if ($request->stockMinimo > $request->stockActual) {
                return response()->json(['mensaje' => 'el stock minimo no puede ser menor al stock actual'], 422);
            }

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
            'codProducto' => 'integer',
            'nombreProducto' => 'required|string',
            'precioVenta' => 'required|numeric',
            'stockMinimo' => 'required|integer',
            'stockActual' => 'required|integer',
            'codBarra' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 404);
        }

        $id = Producto::find($request->codProducto);
        if (!$id) {
            return response()->json(['mensaje' => 'No se encontro el Producto'], 404);
        }

        DB::beginTransaction();
        try {
            $id->nombreProducto = $request->nombreProducto;
            $id->precioVenta = $request->precioVenta;
            $id->stockMinimo = $request->stockMinimo;
            $id->stockActual = $request->stockActual;
            $id->codBarra = $request->codBarra;

            if ($request->stockMinimo > $request->stockActual) {
                return response()->json(['mensaje' => 'el stock minimo no puede ser menor al stock actual'], 422);
            }

            $id->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Producto editado con exito'], 200);
    }
}