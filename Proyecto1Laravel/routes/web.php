<?php

use App\Http\Controllers\productoControllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

//para redirigir la vista en el navegador
Route::get('/crearP', [productoControllers::class, 'crearP'])->name('crearP');

//ruta para redirigir vista 
Route::get('tipoProducto', [productoControllers::class, 'tipoProducto'])->name('tipoProducto');

//da acceso a todos los metodos en el controlador
//Route::resource('productos', productoControllers::class);

