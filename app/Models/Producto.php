<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "producto";
    protected $primaryKey = "codProducto";
    public $timestamps = false;
    public function DetalleFactura()
    {
        return $this->hasMany(Factura::class, 'codProducto');
    }
}
