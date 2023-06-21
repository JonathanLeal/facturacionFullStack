<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    //use HasFactory;
    protected $table = "detallefactura";
    protected $primaryKey = "codDetalle";
    public $timestamps = false;
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'codVendedor');
    }
    public function cliente()
    {
        return $this->belongsTo(Vendedor::class, 'codCliente');
    }
    public function producto()
    {
        return $this->belongsTo(Vendedor::class, 'codProducto');
    }
}
