<?php

namespace App\Http\Controllers;

use App\Models\tipoProductoModels;
use Illuminate\Http\Request;

class tipoProductoControllers extends Controller
{
    public function tipoProducto() {

        return view('productos.tipoProducto');
        
    }

    public function guardarTipoP(Request $request) {

        $request->validate([
        'nombreTipoProducto' => 'required',
        ]);

        // Crear una nueva instancia del modelo
        $tipoProducto = new TipoProductoModels();

        // Asignar el valor al atributo
        $tipoProducto->nombreTipoProducto = $request->nombreTipoProducto;

        // Guardar el tipo de producto en la base de datos
        $tipoProducto->save();

        // Redirigir con un mensaje
        return redirect()->route('tipoProducto')->with('mensaje', 'Tipo Producto Guardado');

        //para ver o verificar que ingresa
        //return response()->json(['mensaje' => 'Tipo Producto Guardado']);
    }

}