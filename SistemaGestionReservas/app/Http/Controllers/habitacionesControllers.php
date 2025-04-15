<?php

namespace App\Http\Controllers;

use App\Models\habitacionesModels;
use App\Models\TipoHabitacionModels;

use Illuminate\Http\Request;

class habitacionesControllers extends Controller
{
    
    //muestra la vista de registro de habitaciones
    public function registroHabitacion() {
        $tipoHabi = TipoHabitacionModels::all();
        return view('admin.habitaciones.registrarHabitacion', compact('tipoHabi'));
        
    }

    //Metodo para registrar habitaciones
    public function registrarHabitacion(Request $request) {

        // Validar los datos de entrada
        $request->validate([
            'numHabi' => 'required',
            'idTipoHabi' => 'required',
            'precio' => 'required',
        ]);

        try {
            // Crear una nueva instancia del modelo
            $habitacion = new habitacionesModels();

            $habitacion->numero = $request->input('numHabi');
            $habitacion->idTipoHabi = $request->input('idTipoHabi');
            $habitacion->precio = $request->input('precio');

            // Guardar la habitación en la base de datos
            $habitacion->save();

            return redirect()->route('registroHabitacion')->with('success', 'Habitación registrada exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('registroHabitacion')->with('error', 'Error al registrar la habitación: ' . $e->getMessage());
        }
    }

    //muestra la vista de consulta de habitaciones
    public function consultaHabitacion() {
        $habitaciones = habitacionesModels::with('tipoHabitacion')->get();
        return view('admin.habitaciones.consultaHabitacion', compact('habitaciones'));
    }

    //Metodo para consultar habitaciones por número de habitación
    public function consultaHabitacionNumHabi(Request $request) {

        try {

            $numHabi = $request->input('numHabi');

            $habitaciones = habitacionesModels::where('numero', $numHabi)->with('tipoHabitacion')->get();

            if ($habitaciones) {
                return view('admin.habitaciones.consultaHabitacion', compact('habitaciones'));
            }else {
                return redirect()->route('consultaHabitacion')->with('error', 'No se encontró la habitación con el número: ' . $numHabi);
            }

        } catch (\Exception $e) {
            return redirect()->route('consultaHabitacion')->with('error', 'Error al consultar la habitación: ' . $e->getMessage());
        }

    }

    //muestra la vista de actualizar habitaciones
    public function vistaActualizarHabitacion($idHabitacion) {

        try {

            $tipoHabi = TipoHabitacionModels::all();

            $habitacion = habitacionesModels::find($idHabitacion);

            return view('admin.habitaciones.actualizarHabitacion', compact('habitacion', 'tipoHabi'));
        
        } catch (\Exception $e) {
            return redirect()->route('consultaHabitacion')->with('error', 'Error al encontrar la habitación: ' . $e->getMessage());
        }

    }


    //Metodo para actualizar habitaciones
    public function actualizarHabitacion(Request $request, $idHabitacion) {

        try {
                // Validar los datos de entrada
                $request->validate([
                'numHabi' => 'required',
                'idTipoHabi' => 'required',
                'precio' => 'required',
                ]);

        
                // Buscar la habitación por su ID
                $habitacion = habitacionesModels::find($idHabitacion);

                // Actualizar los campos de la habitación
                $habitacion->numero = $request->input('numHabi');
                $habitacion->idTipoHabi = $request->input('idTipoHabi');
                $habitacion->precio = $request->input('precio');

            // Guardar los cambios en la base de datos
            $habitacion->save();

            return redirect()->route('consultaHabitacion')->with('success', 'Habitación actualizada exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('consultaHabitacion')->with('error', 'Error al actualizar la habitación: ' . $e->getMessage());
        }
    }


    //metodo para eliminar habitaciones
    public function eliminarHabitacion($idHabitacion) {

        try {
            
            $habitacion = habitacionesModels::find($idHabitacion);
            $habitacion->delete();

            return redirect()->route('consultaHabitacion')->with('success', 'Habitación eliminada exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('consultaHabitacion')->with('error', 'Error al eliminar la habitación: ' . $e->getMessage());
        }
    }



}
