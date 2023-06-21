<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function obtenerVendedores(){
        $vendedores = Vendedor::all();
        if (count($vendedores) == 0) {
            return response()->json(['mensaje' => 'no hay vendedores registrados']);
        }
        return response()->json($vendedores);
    }
}
