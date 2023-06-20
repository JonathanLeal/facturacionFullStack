<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function obtenerClientes(){
        $cliente = Cliente::all();
        if (count($cliente) == 0) {
            return response()->json(['mensaje' => 'No hay clientes registrados'], 404);
        }
        return response()->json($cliente);
    }

    public function obtenerCliente($codCliente){
        $id = Cliente::find($codCliente);
        if (!$id) {
            return response()->json(['mensaje' => 'No se encontro el cliente'], 404);
        }
        return response()->json($id);
    }

    public function guardarCliente(Request $request){
        $validator = Validator::make($request->all(),[
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'direccion' => 'required|string',
            'cod_cliente' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 404);
        }

        DB::beginTransaction();
        try {
            $cliente = new Cliente();
            $cliente->nombres = $request->nombres;
            $cliente->apellidos = $request->apellidos;
            $cliente->direccion = $request->direccion;
            $cliente->cod_cliente = $request->cod_cliente;
            $cliente->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Cliente guardado con exito'], 200);
    }

    public function eliminar($codCliente){
        $id = Cliente::find($codCliente);
        if (!$id) {
            return response()->json(['mensaje' => 'No se encontro el cliente'], 404);
        }
        $id->delete();
        return response()->json(['mensaje' => 'Cliente eliminado con exito'], 200);
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

        $id = Cliente::find($request->codCliente);
        if (!$id) {
            return response()->json(['mensaje' => 'No se encontro el cliente'], 404);
        }

        DB::beginTransaction();
        try {
            $id->nombres = $request->nombres;
            $id->apellidos = $request->apellidos;
            $id->direccion = $request->direccion;
            $id->cod_cliente = $request->cod_cliente;
            $id->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Cliente editado con exito'], 200);
    }
}
