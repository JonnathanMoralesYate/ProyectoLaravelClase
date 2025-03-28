<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tipoProductoModels;
use App\Models\productoModels;
use Illuminate\Routing\Controller;

class productoControllers extends Controller 
{   /*
    public function crearP() {
        return view('productos.crearP');
    }*/

    public function listaTipoProductos() {

        $tipoProducto = tipoProductoModels::all();                      // Obtiene todos los tipos de productos
        return view('productos.crearP', compact('tipoProducto'));
    }

    /*  listaTipoProductos(): Es el nombre de la función, que se usará para obtener y mostrar los tipos de productos.
        tipoProductoModels::all();:

        tipoProductoModels es el modelo de la base de datos que representa la tabla donde están almacenados los tipos de productos.

        all() es un método de Eloquent (ORM de Laravel) que recupera todos los registros de la tabla asociada al modelo tipoProductoModels.

        El resultado es una colección de todos los tipos de productos en la base de datos.

        $tipoProducto: Variable donde se almacenan los tipos de productos obtenidos.

        return view('productos.crearP', compact('tipoProducto'));:

        view('productos.crearP'): Carga la vista crearP.blade.php que está dentro de la carpeta productos en resources/views/.

        compact('tipoProducto'): Convierte la variable $tipoProducto en un array asociativo ['tipoProducto' => $tipoProducto], que se envía a la vista.

        La vista podrá acceder a los tipos de productos mediante la variable $tipoProducto.

    */



//Funcion para guardar los productos
    public function guardarProductos(Request $request) {

        //dd($request->all()); // Esto detendrá la ejecución y mostrará los datos enviados

        $request->validate([
        'nombreProducto' => 'required',
        'fotoProducto' => 'required',           //'required|image|mimes:jpg,jpeg,png|max:2048', // Solo imágenes de hasta 2MB
        'idTipoProducto' => 'required',
        ]);

        // Crear una nueva instancia del modelo
        $producto = new productoModels();

        if($request->hasFile('fotoProducto')) {

            $imagen = $request->file('fotoProducto');                                   // Obtener el arcvhivo la imagen correctamente
            $nombreImagen = $imagen->getClientOriginalName();                           // Obtener el nombre original de la imagen
            $rutaImagen = $imagen->storeAs('productos', $nombreImagen, 'public');
        }

        // Asignar el valor al atributo
        $producto->nombreProducto = $request->nombreProducto;
        $producto->fotoProducto = $nombreImagen;
        $producto->idTipoProducto = $request->idTipoProducto;

        // Guardar el tipo de producto en la base de datos
        $producto->save();
        //muestra el array de producto que envia a guardar
        //dd('Producto guardado:', $producto);

        // Redirigir con un mensaje
        return redirect()->route('crearP')->with('mensaje', 'Producto Guardado');

        //para ver o verificar que ingresa
        //return response()->json(['mensaje' => 'Tipo Producto Guardado']);
    }


   /* public function listaP() {
        //sin relacion de llave foraneas
        //$productos = productoModels::all();
        //return view('productos.listaP', compact('productos'));

        //con relacion de llave foraneas
        $productos = productoModels::with('tipoproducto')->get();
        return view('productos.listaProductos', compact('productos'));
    }*/

    public function listaProductos() {

        $productos = productoModels::all();                      // Obtiene todos los tipos de productos
        return view('productos.listaProductos', compact('productos'));
    }


    
}
