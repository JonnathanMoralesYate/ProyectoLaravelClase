<?php

use App\Http\Controllers\productoControllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//para redirigir la vista en el navegador
Route::get('/crearP', [productoControllers::class, 'crearP'])->name('crearP');

//ruta para redirigir vista 

