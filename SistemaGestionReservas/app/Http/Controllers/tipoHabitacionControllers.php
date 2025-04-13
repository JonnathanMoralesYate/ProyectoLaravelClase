<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipoHabitacionModels;

class tipoHabitacionControllers extends Controller
{
    
    //muestra la vista de registro de tipo de habitación
    public function registroTipoHabi() {
        return view('admin.tipoHabitacion.registrarTipoHabi');
    }


    //Metodo para registar los tipos de habitación
    public function registrarTipoHabi(Request $request) {

        
        $request->validate([
            'tipoHabi' => 'required|string|max:255',
        ]);

        try {
            
            $tipoHabitacion = new tipoHabitacionModels();

            $tipoHabitacion->tipoHabi = $request->input('tipoHabi');

            $tipoHabitacion->save();

            return redirect()->route('registrarTipoHabi')->with('success', 'Tipo de habitación registrado exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('registrarTipoHabi')->with('error', 'Error al registrar el tipo de habitación: ' . $e->getMessage());
        }
    }


    //muestra la vista de consulta de tipo de habitación
    public function consultaTipoHabi() {

        $tiposHabi = tipoHabitacionModels::all();
        return view('admin.tipoHabitacion.consultaTipoHabi', compact('tiposHabi'));
    }


    //consulta el tipo de habitación por nombre de tipo de habitación
    public function consultaTipoHabiNombre(Request $request) {

        try {
            
            $tipoHabi = $request->input('tipoHabi');

            $tiposHabi = tipoHabitacionModels::where('tipoHabi', 'LIKE', '%' . $tipoHabi . '%')->get();

            return view('admin.tipoHabitacion.consultaTipoHabi', compact('tiposHabi'));

        } catch (\Exception $e) {
            return redirect()->route('consultaTipoHabi')->with('error', 'Error al consultar el tipo de habitación: ' . $e->getMessage());
        }

    }


    //muestra la vista de actualizar tipo de habitación
    public function vistaActualizarTipoHabi($idTipoHabi) {

        try {
            
            $tipoHabi = tipoHabitacionModels::find($idTipoHabi);

            return view('admin.tipoHabitacion.actualizarTipoHabi', compact('tipoHabi'));

        } catch (\Exception $e) {
            return redirect()->route('consultaTipoHabi')->with('error', 'Error al mostrar la vista de actualización: ' . $e->getMessage());
        }

    }


    //actualiza el tipo de habitación
    public function actualizarTipoHabi(Request $request, $idTipoHabi) {

        try {
            
            $tipoHabitacion = tipoHabitacionModels::find($idTipoHabi);

            $tipoHabitacion->tipoHabi = $request->input('tipoHabi');

            $tipoHabitacion->save();

            return redirect()->route('consultaTipoHabi')->with('success', 'Tipo de habitación actualizado exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('consultaTipoHabi')->with('error', 'Error al actualizar el tipo de habitación: ' . $e->getMessage());
        }

    }

    //elimina el tipo de habitación
    public function eliminarTipoHabi($idTipoHabi) {

        try {
            
            $tipoHabitacion = tipoHabitacionModels::find($idTipoHabi);

            $tipoHabitacion->delete();

            return redirect()->route('consultaTipoHabi')->with('success', 'Tipo de habitación eliminado exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('consultaTipoHabi')->with('error', 'Error al eliminar el tipo de habitación: ' . $e->getMessage());
        }

    }



}
