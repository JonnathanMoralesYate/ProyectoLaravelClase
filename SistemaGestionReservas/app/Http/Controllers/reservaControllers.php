<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estadoReservaModels;
use App\Models\reservaModels;
use App\Models\usuarioModels;
use App\Models\habitacionesModels;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class reservaControllers extends Controller
{

    public function __construct()
    {
        // Aplicar el middleware auth para proteger todas las funciones de este controlador
        $this->middleware('auth');
    }
    
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

                    $user = Auth::user();

                    // Redirigir según el rol
                    switch ($user->tipoUsuario->tipoUsuario) 
                    {
                        case 'Administrador':
                            $reserva->save();
                            return redirect()->route('registroReserva')->with('success', 'Reserva registrada exitosamente.');
                        case 'Empleado':
                            // Guardar el usuario en la base de datos
                            $reserva->save();
                            return redirect()->route('registroReservaE')->with('success', 'Reserva registrada exitosamente.');
                        case 'Cliente':
                            $reserva->save();
                            return redirect()->route('registroReservaC')->with('success', 'Reserva registrada exitosamente.');

                        default:
                        Auth::logout(); // por seguridad

                        //muestra el mensaje de error y lo redirige a la vista de inicio
                        return redirect('/')->withErrors(['email' => 'Rol no válido']);
                    }

            } 
            catch (\Exception $e) 
            {
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
        $request->validate(['numDocum' => 'required']);

        try {

                $numDocum = $request->input('numDocum');

                $reservas = reservaModels::whereHas('usuario', function ($query) use ($numDocum) {$query->where('numDocum', $numDocum);})->with(['usuario', 'habitacion', 'estadoReserva'])->get();

                if ($reservas) 
                {
                    $user = Auth::user();

                    // Redirigir según el rol
                    switch ($user->tipoUsuario->tipoUsuario) 
                    {
                        case 'Administrador':
                            return view('admin.reservas.consultaReservas', compact('reservas'));
                        case 'Empleado':
                            return view('employee.reservas.consultaReservas', compact('reservas'));
                            
                        default:
                        Auth::logout(); // por seguridad

                        //muestra el mensaje de error y lo redirige a la vista de inicio
                        return redirect('/')->withErrors(['email' => 'Rol no válido']);
                    }
                }
                else 
                {
                    return redirect()->route('consultaUsuaNumDocum')->with('error', 'Usuario no encontrado.');
                }            

            }
            catch (\Exception $e) 
            {
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

            $user = Auth::user();

                    // Redirigir según el rol
                    switch ($user->tipoUsuario->tipoUsuario) 
                    {
                        case 'Administrador':
                            $reserva->save();
                            return redirect()->route('consultaReservas')->with('success', 'Reserva actualizada exitosamente.');
                        case 'Empleado':
                            // Guardar el usuario en la base de datos
                            $reserva->save();
                            return redirect()->route('consultaReservasE')->with('success', 'Reserva actualizada exitosamente.');
                        case 'Cliente':
                            // Guardar el usuario en la base de datos
                            $reserva->save();
                            return redirect()->route('consultaReservasC')->with('success', 'Reserva actualizada exitosamente.');

                        default:
                        Auth::logout(); // por seguridad

                        //muestra el mensaje de error y lo redirige a la vista de inicio
                        return redirect('/')->withErrors(['email' => 'Rol no válido']);
                    }

            // Guardar los cambios en la base de datos
            $reserva->save();

        
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


    //metodo de consulta para ver habitaciones disponibles, utilizando ajas
    public function verDisponibilidad(Request $request)
    {
        $fechaInicio = $request->fechaInicio;
        $fechaFin = $request->fechaFin;

        $habitaciones = DB::table('habitaciones as h')
            ->join('tipoHabitacion as th', 'h.idTipoHabi', '=', 'th.idTipoHabi')
            ->whereNotIn('h.idHabitacion', function ($query) use ($fechaInicio, $fechaFin) {
                $query->select('r.idHabitacion')
                    ->from('reservas as r')
                    ->join('estado as e', 'r.idEstado', '=', 'e.idEstado')
                    ->whereIn('e.estado', ['Pendiente', 'Confirmada'])
                    ->where(function ($q) use ($fechaInicio, $fechaFin) {
                        $q->where(function ($query) use ($fechaInicio, $fechaFin) {
                        $query->where('r.fechaInicio', '<=', $fechaFin)
                                ->where('r.fechaFin', '>=', $fechaInicio);
                        });
                    });
            })
                ->select('h.idHabitacion', 'h.numero', 'th.tipoHabi', 'h.precio')
                ->get();

                return response()->json($habitaciones);
}



}
