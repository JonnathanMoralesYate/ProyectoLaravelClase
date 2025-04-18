<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estadoReservaModels;
use App\Models\reservaModels;
use App\Models\usuarioModels;

class reservaControllers extends Controller
{
    
    //Muestra la vista de registro de reserva
    public function registroReserva()
    {
        $estadoR = estadoReservaModels::all();
        return view('admin.reservas.registrarReservas', compact('estadoR'));
    }

    //metodo para registar reserva
    public function registrarReserva(Request $request)
    {
        //dd($request->all());

        // Validar los datos de entrada
        $request->validate([
            'numDocum' => 'required',
            'idHabi' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'idEstado' => 'required'
        ]);

        try {

            // Buscar el cliente por su número de documento
            $cliente = usuarioModels::where('numDocum', $request->input('numDocum'))->first();

            

            if (!$cliente) {
                return redirect()->route('admin.reservas.registrarReservas')->with('error', 'Cliente no encontrado.');
            }

            // Crear una nueva instancia del modelo
            $reserva = new reservaModels();

            $reserva->idUsuario = $cliente->idUsuario;
            $reserva->idHabitacion = $request->input('idHabi');
            $reserva->fechaInicio = $request->input('fechaInicio');
            $reserva->fechaFin = $request->input('fechaFin');
            $reserva->idEstado = $request->input('idEstado');

            // Guardar la reserva en la base de datos
            $reserva->save();

            return redirect()->route('registroReserva')->with('success', 'Reserva registrada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('registroReserva')->with('error', 'Error al registrar la reserva: ' . $e->getMessage());
        }
    }

    //Muestra la vista de consulta de reserva
    public function consultaReserva()
    {
        $reservas = reservaModels::with(['usuario', 'habitacion', 'estadoReserva'])->get();
        return view('admin.reservas.consultaReservas', compact('reservas'));
    }

    //Consulta reserva por numero de documento
    public function consultaReservaNumDocum(Request $request)
    {
        $request->validate([
            'numDocum' => 'required'
        ]);

        try {
            $numDocum = $request->input('numDocum');

            $reservas = reservaModels::whereHas('usuario', function ($query) use ($numDocum) {$query->where('numDocum', $numDocum);})->with(['usuario', 'habitacion', 'estadoReserva'])->get();

            if ($reservas->isEmpty()) {
                return redirect()->route('consultaReservas')->with('error', 'No se encontraron reservas para el número de documento proporcionado.');
            }

            return view('admin.reservas.consultaReservas', compact('reservas'));
        } catch (\Exception $e) {
            return redirect()->route('consultaReservas')->with('error', 'Error al consultar las reservas: ' . $e->getMessage());
        }
    }

    //Muestra la vista de actualizar reserva
    public function vistaActualizarReserva($idReserva)
    {
        $reserva = reservaModels::with('usuario')->findOrFail($idReserva);

        $estadoR = estadoReservaModels::all();

        return view('admin.reservas.actualizaReserva', compact('reserva', 'estadoR'));
    }

    //Actualizar reserva
    public function actualizarReserva(Request $request, $idReserva)
    {

        // Validar los datos de entrada
        $request->validate([
            'numDocum' => 'required',
            'idHabi' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'idEstado' => 'required'
        ]);

        try {
            // Buscar el cliente por su número de documento
            $cliente = usuarioModels::where('numDocum', $request->input('numDocum'))->first();

            if (!$cliente) {
                return redirect()->route('admin.reservas.actualizaReserva', ['idReserva' => $idReserva])->with('error', 'Cliente no encontrado.');
            }

            // Buscar la reserva por su ID
            $reserva = reservaModels::findOrFail($idReserva);

            // Actualizar los campos de la reserva
            $reserva->idUsuario = $cliente->idUsuario;
            $reserva->idHabitacion = $request->input('idHabi');
            $reserva->fechaInicio = $request->input('fechaInicio');
            $reserva->fechaFin = $request->input('fechaFin');
            $reserva->idEstado = $request->input('idEstado');

            // Guardar los cambios en la base de datos
            $reserva->save();

            return redirect()->route('consultaReservas')->with('success', 'Reserva actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.reservas.actualizaReserva', ['idReserva' => $idReserva])->with('error', 'Error al actualizar la reserva: ' . $e->getMessage());
        }
    }

    //Eliminar reserva
    public function eliminarReserva($idReserva)
    {
        try {
            // Buscar la reserva por su ID
            $reserva = reservaModels::findOrFail($idReserva);

            // Eliminar la reserva de la base de datos
            $reserva->delete();

            return redirect()->route('consultaReservas')->with('success', 'Reserva eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('consultaReservas')->with('error', 'Error al eliminar la reserva: ' . $e->getMessage());
        }
    }



}
