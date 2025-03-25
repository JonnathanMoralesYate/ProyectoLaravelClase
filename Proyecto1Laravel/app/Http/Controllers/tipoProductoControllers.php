<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tipoProductoControllers extends Controller
{
    public function tipoProducto() {
        return view('productos.tipoProducto');
    }
}
