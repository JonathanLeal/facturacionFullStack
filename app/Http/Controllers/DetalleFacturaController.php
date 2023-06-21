<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalleFacturaController extends Controller
{
    protected $table = "detallefactura";
    protected $primaryKey = "codDetalle";
    public $timestamps = false;
}
