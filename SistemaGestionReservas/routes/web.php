<?php

use App\Http\Controllers\usuarioControllers;
use Illuminate\Support\Facades\Route;

//Rutas para navegar por la pagina de inicio

Route::get('/', function () {return view('inicio');})->name('inicio');
Route::view('/historia', 'public.historia')->name('historia');
Route::view('/nosotros', 'public.nosotros')->name('nosotros');
Route::view('/contacto', 'public.contacto')->name('contacto');

Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');

//Rutas para el registro de usuario
Route::get('/admin/users/registroUsua',[usuarioControllers::class, 'registroUsua'])->name('registroUsua');
