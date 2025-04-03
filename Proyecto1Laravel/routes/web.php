<?php

use App\Http\Controllers\productoControllers;
use App\Http\Controllers\tipoProductoControllers;
use Illuminate\Support\Facades\Route;

//ruta que redirige a la vista principal
Route::get('/', function () {return view('welcome');});

//para redirigir la vista en el navegador a la vista crearP
//Route::get('/crearP', [productoControllers::class, 'crearP'])->name('crearP');

//ruta que envia los datos de tipos de producto a la vista crearP
Route::get('/crearP', [productoControllers::class, 'listaTipoProductos'])->name('crearP');

//ruta para redirigir vista 
Route::get('tipoProducto', [tipoProductoControllers::class, 'tipoProducto'])->name('tipoProducto');

//da acceso a todos los metodos en el controlador
//Route::resource('productos', productoControllers::class);

//ruta para guardar el tipo producto
Route::post('/guardarTipoP', [tipoProductoControllers::class, 'guardarTipoP'])->name('guardarTipoP');

//ruta para guardar el producto
Route::post('/guardarProductos', [productoControllers::class, 'guardarProductos'])->name('guardarProductos');

//ruta para mostrar lista de productos
Route::get('/listaP', [productoControllers::class, 'listaProductos'])->name('listaP');

//ruta para mostrar la vista de eliminar producto
Route::get('/eliminarP', [productoControllers::class, 'eliminarP'])->name('eliminarP');

//ruta para eliminar el producto
Route::delete('/eliminarProducto/{idProducto}', [productoControllers::class, 'eliminarProducto'])->name('eliminarProducto');

//ruta para mostrar lista de tipo producto
Route::get('/listaTipoP', [tipoProductoControllers::class, 'listaTipoP'])->name('listaTipoP');

//ruta para mostrar la vista de eliminar tipo producto
Route::get('/eliminarTipoP', [tipoProductoControllers::class, 'eliminarTipoP'])->name('eliminarTipoP');

//ruta para eliminar el tipo de producto
Route::delete('/eliminarTipoProducto/{idTipoProducto}', [tipoProductoControllers::class, 'eliminarTipoProducto'])->name('eliminarTipoProducto');