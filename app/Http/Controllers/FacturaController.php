<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    protected $table = "factura";
    protected $primaryKey = "codFactura";
    public $timestamps = false;
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'codVendedor');
    }

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'codCliente');
    }
}
