<?php

use App\Http\Controllers\usuarioControllers;
use App\Http\Controllers\tipoHabitacionControllers;
use App\Http\Controllers\estadoReservaControllers;
use Illuminate\Support\Facades\Route;

//Rutas para navegar por la pagina de inicio

Route::get('/', function () {return view('inicio');})->name('inicio');
Route::view('/historia', 'public.historia')->name('historia');
Route::view('/nosotros', 'public.nosotros')->name('nosotros');
Route::view('/contacto', 'public.contacto')->name('contacto');

Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');

//rutas del modulo de usuarios

//Rutas para vista de registro de usuario
Route::get('/admin/users/registroUsua',[usuarioControllers::class, 'registroUsua'])->name('registroUsua');

//Ruta para registrar usuario
Route::post('/admin/users/registrarUsuario',[usuarioControllers::class, 'registrarUsuario'])->name('registrarUsuario');

//Ruta para vista de consulta de usuario y filtrar por número de documento
Route::get('/admin/users/consultaUsuaNumDocum',[usuarioControllers::class, 'consultaUsuaNumDocum'])->name('consultaUsuaNumDocum');

//Ruta para consulta de usuario y filtrar por numero documento
Route::post('/admin/users/consultaUsuaNumDocu', [usuarioControllers::class, 'consultaUsuaNumDocu'])->name('consultaUsuaNumDocu');

//Ruta para vista de actualizar usuario
Route::get('/admin/users/actualizarUsua/{idUsuario}', [usuarioControllers::class, 'vistaActualizarUsua'])->name('vistaActualizarUsua');

//Ruta para actualizar usuario
Route::put('/admin/users/actualizarUsuario/{idUsuario}', [usuarioControllers::class, 'actualizarUsuario'])->name('actualizarUsuario');

//Ruta para eliminar usuario
Route::delete('/admin/users/consultaUsuaNumDocu/{idUsuario}', [usuarioControllers::class, 'eliminarUsuario'])->name('eliminarUsuario');


//rutas del modulo de tipo de habitacion

//Ruta para vista de registro de tipo de habitación
Route::get('/admin/tipoHabitacion/registrarTipoHabi', [tipoHabitacionControllers::class, 'registroTipoHabi'])->name('registroTipoHabi');

//Ruta para registrar tipo de habitación
Route::post('/admin/tipoHabitacion/registrarTipoHabi', [tipoHabitacionControllers::class, 'registrarTipoHabi'])->name('registrarTipoHabi');

//Ruta para vista de consulta de tipo de habitación
Route::get('/admin/tipoHabitacion/consultaTipoHabi', [tipoHabitacionControllers::class, 'consultaTipoHabi'])->name('consultaTipoHabi');

//Ruta para consulta de tipo de habitación por nombre
Route::post('/admin/tipoHabitacion/consultaTipoHabiNombre', [tipoHabitacionControllers::class, 'consultaTipoHabiNombre'])->name('consultaTipoHabiNombre');

//Ruta para vista de actualizar tipo de habitación
Route::get('/admin/tipoHabitacion/actualizarTipoHabi/{idTipoHabi}', [tipoHabitacionControllers::class, 'vistaActualizarTipoHabi'])->name('vistaActualizarTipoHabi');

//Ruta para actualizar tipo de habitación
Route::put('/admin/tipoHabitacion/actualizarTipoHabi/{idTipoHabi}', [tipoHabitacionControllers::class, 'actualizarTipoHabi'])->name('actualizarTipoHabi');

//Ruta para eliminar tipo de habitación
Route::delete('/admin/tipoHabitacion/consultaTipoHabi/{idTipoHabi}', [tipoHabitacionControllers::class, 'eliminarTipoHabi'])->name('eliminarTipoHabi');

//rutas del modulo de estado reservacion

//Ruta para vista de registro de estado de reservación
Route::get('/admin/estadoReservacion/registrarEstadoR', [estadoReservaControllers::class, 'registroEstadoReserva'])->name('vistaRegistroEstadoR');

//Ruta para registrar estado de reservación
Route::post('/admin/estadoReservacion/registrarEstadoR', [estadoReservaControllers::class, 'registrarEstadoReserva'])->name('registrarEstadoR');

//Ruta para vista de consulta de estado de reservación
Route::get('/admin/estadoReservacion/consultaEstadoR', [estadoReservaControllers::class, 'consultaEstadoReserva'])->name('consultaEstadoR');

//Ruta para consulta de estado de reservación por nombre
Route::post('/admin/estadoReservacion/consultaEstadoRNombre', [estadoReservaControllers::class, 'consultaEstadoReservaNombre'])->name('consultaEstadoRNombre');

//Ruta para vista de actualizar estado de reservación
Route::get('/admin/estadoReservacion/actualizarEstadoR/{idEstadoR}', [estadoReservaControllers::class, 'vistaActualizarEstadoR'])->name('vistaActualizarEstadoR');

//Ruta para actualizar estado de reservación
Route::put('/admin/estadoReservacion/actualizarEstadoR/{idEstadoR}', [estadoReservaControllers::class, 'actualizarEstadoR'])->name('actualizarEstadoR');

//Ruta para eliminar estado de reservación
Route::delete('/admin/estadoReservacion/consultaEstadoR/{idEstadoR}', [estadoReservaControllers::class, 'eliminarEstadoR'])->name('eliminarEstadoR');