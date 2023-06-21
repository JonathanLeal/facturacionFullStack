<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
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
