<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleFacturaController extends Controller
{
   public function listarClientes(){
    $clientes = DB::table('cliente AS c')
                    ->select('c.codCliente', 'c.nombres')
                    ->get();
    return response()->json($clientes);
   }
}
