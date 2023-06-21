<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = "vendedor";
    protected $primaryKey = "codVendedor";
    public $timestamps = false;
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'codVendedor');
    }
    public function DetalleFactura()
    {
        return $this->hasMany(Factura::class, 'codVendedor');
    }
}
