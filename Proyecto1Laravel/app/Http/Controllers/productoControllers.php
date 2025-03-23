<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\productoModels;
use Illuminate\Routing\Controller;

class productoControllers extends Controller 
{
    public function crearP() {
        return view('productos.crearP');
    }
    
}
