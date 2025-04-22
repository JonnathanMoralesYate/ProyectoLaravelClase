<?php

namespace App\Http\Controllers;

use App\Models\tipoDocumentoModels;
use App\Models\tipoUsuarioModels;
use App\Models\HabitacionesModels;
use App\Models\estadoReservaModels;
use App\Models\reservaModels;
use App\Models\usuarioModels;

use Illuminate\Routing\Controller;

class employeControllers extends Controller
{

    public function __construct()
    {
        // Aplicar el middleware auth para proteger todas las funciones de este controlador
        $this->middleware('auth');
    }

   //Muestra la vista de registro del rol empleado
    public function registroUsuaE() {
        $tiposDocum = TipoDocumentoModels::all();
        $tiposUsua = TipoUsuarioModels::whereIn('idTipoUsua', [1, 2])->get();
        return view('employee.users.registroUsua', compact('tiposDocum', 'tiposUsua'));
        
    }


    //muestra la visata de consulta del rol empleado
    public function consultaUsuaNumDocumE() {
        $usuarios = usuarioModels::with(['tipoDocumento', 'tipoUsuario'])
                                ->whereHas('tipoUsuario', function($query) {$query->where('idTipoUsua', '!=', 3); // Excluye a los usuarios con tipoUsuario_id = 1 (admin)
            })->get();
    
        return view('employee.users.consultaUsuaNumDocum', compact('usuarios'));
    }
    

    //muestra la vista de actualizar del rol empleado
    public function vistaActualizarUsuaE($idUsuario) {

        try {

            $tiposDocum = TipoDocumentoModels::all();
            $tiposUsua = TipoUsuarioModels::whereIn('idTipoUsua', [1, 2])->get();

            $usuario = usuarioModels::find($idUsuario);

            return view('employee.users.actualizarUsua', compact(['tiposDocum', 'tiposUsua', 'usuario']));

        } catch (\Exception $e) {

            return redirect()->route('consultaUsuaNumDocumE')->with('error', 'Error al Actualizar usuario: ' . $e->getMessage());

            }
    }


    //rutas de reservas rol empleado


    //muestra la vista de registro de reserva
    public function registroReservaE() {
        $habitaciones = HabitacionesModels::all();
        $estadoR = estadoReservaModels::all();
        return view('employee.reservas.registrarReservas', compact('habitaciones', 'estadoR'));
    }


    //muestra la vista de consulta de reserva
    public function consultaReservaE() {
        $reservas = ReservaModels::with(['usuario', 'habitacion', 'estadoReserva'])->get();
        return view('employee.reservas.consultaReservas', compact('reservas'));
    }


    //muestra la vista de actualizar reserva
    public function vistaActualizarReservaE($idReserva) {
        $habitaciones = HabitacionesModels::all();
        $estadoR = estadoReservaModels::all();
        $reserva = reservaModels::find($idReserva);
        return view('employee.reservas.actualizaReserva', compact(['habitaciones', 'estadoR', 'reserva']));
    }


}
