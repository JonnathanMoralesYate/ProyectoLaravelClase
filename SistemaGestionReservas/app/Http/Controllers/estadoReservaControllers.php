<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estadoReservaModels;

class estadoReservaControllers extends Controller
{

    //muestra la vista de registro de estado de reserva
    public function registroEstadoReserva() {
        return view('admin.estadoReserva.registrarEstadoR');
    }

    //Metodo para registar los estados de reserva
    public function registrarEstadoReserva(Request $request) {

        $request->validate([
            'estado' => 'required|string|max:255',
        ]);

        try {
            
            $estadoR = new estadoReservaModels();

            $estadoR->estado = $request->input('estado');

            $estadoR->save();

            return redirect()->route('registrarEstadoR')->with('success', 'Estado de reserva registrado exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('registrarEstadoR')->with('error', 'Error al registrar el estado de reserva: ' . $e->getMessage());
        }
    }

    //muestra la vista de consulta de estado de reserva
    public function consultaEstadoReserva() {

        $estadoRes = estadoReservaModels::all();

        return view('admin.estadoReserva.consultaEstadoR', compact('estadoRes'));
    }


    //consulta el estado de reserva por nombre de estado
    public function consultaEstadoReservaNombre(Request $request) {

        try {
            
            $estado = $request->input('estado');

            $estadoRes = estadoReservaModels::where('estado', 'LIKE', '%' . $estado . '%')->get();

            return view('admin.estadoReserva.consultaEstadoR', compact('estadoRes'));

        } catch (\Exception $e) {
            return redirect()->route('consultaEstadoR')->with('error', 'Error al consultar el estado de reserva: ' . $e->getMessage());
        }
    }

    //muestra la vista de actualizar estado de reserva
    public function vistaActualizarEstadoR($idEstado) {

        $estadoR = estadoReservaModels::find($idEstado);
        return view('admin.estadoReserva.actualizarEstadoR', compact('estadoR'));
    }

    //actualiza el estado de reserva
    public function actualizarEstadoR(Request $request, $idEstado) {

        $request->validate([
            'estado' => 'required|string|max:255',
        ]);

        try {
            
            $estadoR = estadoReservaModels::find($idEstado);

            $estadoR->estado = $request->input('estado');

            $estadoR->save();

            return redirect()->route('consultaEstadoR')->with('success', 'Estado de reserva actualizado exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('consultaEstadoR')->with('error', 'Error al actualizar el estado de reserva: ' . $e->getMessage());
        }
    }

    //elimina el estado de reserva
    public function eliminarEstadoR($idEstado) {

        try {
            
            $estadoR = estadoReservaModels::find($idEstado);

            $estadoR->delete();

            return redirect()->route('consultaEstadoR')->with('success', 'Estado de reserva eliminado exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('consultaEstadoR')->with('error', 'Error al eliminar el estado de reserva: ' . $e->getMessage());
        }
    }
    
}
