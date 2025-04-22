<?php

use App\Http\Controllers\usuarioControllers;
use App\Http\Controllers\tipoHabitacionControllers;
use App\Http\Controllers\estadoReservaControllers;
use App\Http\Controllers\habitacionesControllers;
use App\Http\Controllers\reservaControllers;
use App\Http\Controllers\loginControllers;
use App\Http\Controllers\employeControllers;
use App\Http\Controllers\userControllers;
use Illuminate\Support\Facades\Route;

//Rutas para navegar por la pagina de inicio

Route::get('/', function () {return view('inicio');})->name('inicio');
Route::view('/historia', 'public.historia')->name('historia');
Route::view('/nosotros', 'public.nosotros')->name('nosotros');
Route::view('/contacto', 'public.contacto')->name('contacto');

//Ruta para vista de login
Route::get('/auth/login',[loginControllers:: class, 'login'])->name('login');

//Ruta para vista de registro
Route::get('/auth/registro',[loginControllers:: class, 'registro'])->name('registro');

//Ruta para dashboard administrartivo
Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');

//Ruta para dashboard de usuario
Route::get('/users/dashboard', function () {return view('users.dashboard');})->name('users.dashboard');

//Ruta para dashboard de empleado
Route::get('/employee/dashboard', function () {return view('employee.dashboard');})->name('empleado.dashboard');


//Rutas para el login

//Ruta para iniciar sesión
Route::post('/auth/login/iniciarSeccion',[loginControllers:: class, 'iniciarSeccion'])->name('iniciarSeccion');

//Ruta para cerrar sesión
Route::post('/auth/login/cerrarSeccion',[loginControllers:: class, 'cerrarSesion'])->name('cerrarSeccion');

//Ruta para registrar usuario desde el login
Route::post('/auth/registro/registroUsuario',[loginControllers:: class, 'registroUsuario'])->name('registroUsuario');


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


//Rutas para el modulo de Habitaciones

//Ruta para vista de registro de habitaciones
Route::get('/admin/habitaciones/registroHabitacion', [habitacionesControllers::class, 'registroHabitacion'])->name('registroHabitacion');

//Ruta para registrar habitaciones
Route::post('/admin/habitaciones/registrarHabitacion', [habitacionesControllers::class, 'registrarHabitacion'])->name('registrarHabitacion');

//Ruta para vista de consulta de habitaciones
Route::get('/admin/habitaciones/consultaHabitacion', [habitacionesControllers::class, 'consultaHabitacion'])->name('consultaHabitacion');

//Ruta para consulta de habitaciones por número de habitación
Route::post('/admin/habitaciones/consultaHabitacionNumHabi', [habitacionesControllers::class, 'consultaHabitacionNumHabi'])->name('consultaHabitacionNumHabi');

//Ruta para vista de actualizar habitaciones
Route::get('/admin/habitaciones/actualizarHabitacion/{idHabitacion}', [habitacionesControllers::class, 'vistaActualizarHabitacion'])->name('vistaActualizarHabitacion');

//Ruta para actualizar habitaciones
Route::put('/admin/habitaciones/actualizarHabitacion/{idHabitacion}', [habitacionesControllers::class, 'actualizarHabitacion'])->name('actualizarHabitacion');

//Ruta para eliminar habitaciones
Route::delete('/admin/habitaciones/consultaHabitacion/{idHabitacion}', [habitacionesControllers::class, 'eliminarHabitacion'])->name('eliminarHabitacion');

//Rutas para el modulo de Reservas

//Ruta para vista de registro de reserva
Route::get('/admin/reservas/registrarReservas', [reservaControllers::class, 'registroReserva'])->name('registroReserva');

//Ruta para registrar reserva
Route::post('/admin/reservas/registrarReservas', [reservaControllers::class, 'registrarReserva'])->name('registrarReserva');

//Ruta para vista de consulta de reserva
Route::get('/admin/reservas/consultaReservas', [reservaControllers::class, 'consultaReserva'])->name('consultaReservas');

//Ruta para consulta de reserva por número de documento cliente
Route::post('/admin/reservas/consultaReservasNumDocum', [reservaControllers::class, 'consultaReservaNumDocum'])->name('consultaReservasNumDocum');

//Ruta para vista de actualizar reserva
Route::get('/admin/reservas/actualizaReserva/{idReserva}', [reservaControllers::class, 'vistaActualizarReserva'])->name('vistaActualizarReserva');

//Ruta para actualizar reserva
Route::put('/admin/reservas/actualizaReserva/{idReserva}', [reservaControllers::class, 'actualizarReserva'])->name('actualizarReserva');

//Ruta para eliminar reserva
Route::delete('/admin/reservas/consultaReservas/{idReserva}', [reservaControllers::class, 'eliminarReserva'])->name('eliminarReserva');

//Rutas de modulo empleados

//Ruta para vista de registro 
Route::get('/employee/users/registroUsua', [employeControllers::class, 'registroUsuaE'])->name('registroEmpleado');

//Rutapara vista de consulta
Route::get('/employee/users/consultaUsuaNumDocum', [employeControllers::class, 'consultaUsuaNumDocumE'])->name('consultaUsuaNumDocumE');

//Ruta para vista de actualizar
Route::get('/employee/users/actualizarUsua/{idUsuario}', [employeControllers::class, 'vistaActualizarUsuaE'])->name('vistaActualizarUsuaE');

//Ruta para vista de registro de reserva
Route::get('/employee/reservas/registrarReservas', [employeControllers::class, 'registroReservaE'])->name('registroReservaE');

//Ruta para vista consulta de reserva
Route::get('/employee/reservas/consultaReservas', [employeControllers::class, 'consultaReservaE'])->name('consultaReservasE');

//Ruta para vista de actualizar reserva
Route::get('/employee/reservas/actualizaReserva/{idReserva}', [employeControllers::class, 'vistaActualizarReservaE'])->name('vistaActualizarReservaE');


//Rutas para el modulo de cliente


//Ruta para vista de registro de reserva del cliente
Route::get('/users/reservas/registrarReservas', [userControllers::class, 'registroReservaC'])->name('registroReservaC');

//Ruta para vista de consulta de reserva del cliente
Route::get('/users/reservas/consultaReservas', [userControllers::class, 'consultaReservaNumDocumC'])->name('consultaReservasC');

//Ruta para vista de actualizar reserva del cliente
Route::get('/users/reservas/actualizaReserva/{idReserva}', [userControllers::class, 'vistaActualizarReservaC'])->name('vistaActualizarReservaC');

