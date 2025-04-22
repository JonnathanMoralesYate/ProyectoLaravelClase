<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\estadoReservaModels;
use App\Models\reservaModels;
use Illuminate\Support\Facades\Auth;

class userControllers extends Controller
{
    public function __construct()
    {
        // Aplicar el middleware auth para proteger todas las funciones de este controlador
        $this->middleware('auth');
    }
    
    //Muestra la vista de registro de reserva
    public function registroReservaC()
    {
        //$user = Auth::user();

        $estadoR = estadoReservaModels::all();
        return view('users.reservas.registrarReservas', compact('estadoR'));
    }

    //muestra la vista de consulta de reserva del usuario segun su documento
    public function consultaReservaNumDocumC()
    {
        $user = Auth::user();

        $reservas = reservaModels::with(['usuario', 'habitacion', 'estadoReserva'])->where('idUsuario', $user->idUsuario)->get();

        return view('users.reservas.consultaReservas', compact('reservas'));
    }


    //muestra la vista de actualizar reserva del usuario 
    public function vistaActualizarReservaC($idReserva)
    {

        try {
            
            $estadoR = estadoReservaModels::all();
            $reserva = reservaModels::find($idReserva);

            return view('users.reservas.actualizaReserva', compact(['estadoR', 'reserva']));

        } catch (\Exception $e) {

            return redirect()->route('consultaReservasC')->with('error', 'Error al Actualizar reserva6: ' . $e->getMessage());

        }
    }
}
