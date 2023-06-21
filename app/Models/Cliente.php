<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    protected $primaryKey = "codCliente";
    public $timestamps = false;
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'codCliente');
    }
    public function DetalleFactura()
    {
        return $this->hasMany(Factura::class, 'codCliente');
    }
}
