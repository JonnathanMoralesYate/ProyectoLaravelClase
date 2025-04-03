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


    //muestra la vista de tipo producto
    public function listaTipoP() {

        $tipoProducto = tipoProductoModels::all();
        return view('productos.listaTipoP', compact('tipoProducto'));
    }

    //muestra el formulario para eliminar producto
    public function eliminarTipoP() {
        $tipoProducto = tipoProductoModels::all();
        return view('productos.eliminarTipoP', compact('tipoProducto'));
    }

    //elimina el tipo de producto
    public function eliminarTipoProducto($idTipoProducto) {
        
        $tipoProducto = tipoProductoModels::find($idTipoProducto); // Busca el producto por su ID

        if (!$tipoProducto) {
            return redirect()->route('eliminarTipoP')->with('error', 'Producto no encontrado');
        }

        $tipoProducto->delete(); // Elimina el producto
        return redirect()->route('eliminarTipoP')->with('mensaje', 'Producto eliminado correctamente');
    
    }



}