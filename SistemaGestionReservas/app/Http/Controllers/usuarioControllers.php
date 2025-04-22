<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipoDocumentoModels;
use App\Models\tipoUsuarioModels;
use App\Models\usuarioModels;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;



class usuarioControllers extends Controller
{

    public function __construct()
    {
        // Aplicar el middleware auth para proteger todas las funciones de este controlador
        $this->middleware('auth');
    }

     //muestra el formulario o vista para registrar usuario
    public function registroUsua() {
        $tiposDocum = TipoDocumentoModels::all();
        $tiposUsua = TipoUsuarioModels::all();
        return view('admin.users.registroUsua', compact('tiposDocum', 'tiposUsua'));
        
    }


    //Metodo para guardar los usuarios
    public function registrarUsuario(Request $request) {

        // Validar los datos de entrada
        //dd($request->all());

        // si querés rastrear sin detener ejecución.
        //Log::info($request->all()); 

        $request->validate([
            'idTipoDocum' => 'required',
            'numDocum' => 'required',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'idTipoUsua' => 'required',
            'permiso' => 'required|boolean',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
        ]);

        
        try{
        
                // Crear una nueva instancia del modelo
                $usuario = new UsuarioModels();

                $usuario->idTipoDocum = $request->input('idTipoDocum');
                $usuario->numDocum = $request->input('numDocum');
                $usuario->nombre = $request->input('nombre');
                $usuario->apellido = $request->input('apellido');
                $usuario->idTipoUsua = $request->input('idTipoUsua');
                $usuario->permiso = $request->boolean('permiso'); // asegura 1 o 0
                $usuario->email = $request->input('email');
                //$usuario->password = $request->input('password');
                //$usuario->password = Hash::make($request->input('password'));
                $usuario->password = bcrypt($request->input('password')); // encripta contraseña

                    $user = Auth::user();

                    // Redirigir según el rol
                    switch ($user->tipoUsuario->tipoUsuario) 
                    {
                        case 'Administrador':
                            $usuario->save();
                            return redirect()->route('registroUsua')->with('success', 'Usuario Registrado Exitosamente.');
                        case 'Empleado':
                            // Guardar el usuario en la base de datos
                            $usuario->save();
                            return redirect()->route('registroEmpleado')->with('success', 'Usuario Registrado Exitosamente.');
                        default:
                        Auth::logout(); // por seguridad

                        //muestra el mensaje de error y lo redirige a la vista de inicio
                        return redirect('/')->withErrors(['email' => 'Rol no válido']);
                    }

            } catch (\Exception $e) {

                return redirect()->route('registroUsua')->with('error', 'Error al guardar: ' . $e->getMessage());

            }

    }
    

    //muestra la vista para consultar usuario por numero de documento
    public function consultaUsuaNumDocum() {

        $usuarios = usuarioModels::with(['tipoDocumento', 'tipoUsuario'])->get();
        return view('admin.users.consultaUsuaNumDocum', compact('usuarios'));
        
    }


    //consulta usuario por numero de documento
    public function consultaUsuaNumDocu(Request $request) {

        try {
            
            $numDocum = $request->input('numDocum');
            

            $usuarios = usuarioModels::where('numDocum', $numDocum)->with(['tipoDocumento', 'tipoUsuario'])->get();

                if ($usuarios) 
                {

                    $user = Auth::user();

                    // Redirigir según el rol
                    switch ($user->tipoUsuario->tipoUsuario) 
                    {
                        case 'Administrador':
                            return view('admin.users.consultaUsuaNumDocum', compact('usuarios'));
                        case 'Empleado':
                            return view('employee.users.consultaUsuaNumDocum', compact('usuarios'));
                            
                        default:
                        Auth::logout(); // por seguridad

                        //muestra el mensaje de error y lo redirige a la vista de inicio
                        return redirect('/')->withErrors(['email' => 'Rol no válido']);
                    }
                }else 
                {
                    return redirect()->route('consultaUsuaNumDocum')->with('error', 'Usuario no encontrado.');
                }

            } catch (\Exception $e) {

                return redirect()->route('consultaUsuaNumDocum')->with('error', 'Error al consultar usuario: ' . $e->getMessage());
            }


    }


    //muestra la vista para actualizar usuario
    public function vistaActualizarUsua($idUsuario) {

        try {

            $tiposDocum = TipoDocumentoModels::all();
            $tiposUsua = TipoUsuarioModels::all();

            $usuario = usuarioModels::find($idUsuario);

            return view('admin.users.actualizarUsua', compact(['tiposDocum', 'tiposUsua', 'usuario']));

        } catch (\Exception $e) {

            return redirect()->route('consultaUsuaNumDocum')->with('error', 'Error al Actualizar usuario: ' . $e->getMessage());

            }

    }


    //actualiza el usuario
    public function actualizarUsuario(Request $request, $idUsuario) {


        try {

            $request->validate([
                'idTipoDocum' => 'required',
                'numDocum' => 'required',
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'idTipoUsua' => 'required',
                'permiso' => 'required|boolean',
                'email' => 'required',
                'password' => 'nullable|string|min:6', // te explico abajo por qué "nullable"
            ]);
    
                $usuario = usuarioModels::findOrFail($idUsuario);
                $usuario->idTipoDocum = $request->input('idTipoDocum');
                $usuario->numDocum = $request->input('numDocum');
                $usuario->nombre = $request->input('nombre');
                $usuario->apellido = $request->input('apellido');
                $usuario->idTipoUsua = $request->input('idTipoUsua');
                $usuario->permiso = $request->boolean('permiso'); // asegura 1 o 0
                $usuario->email = $request->input('email');
                //$usuario->password = $request->input('password');
                $usuario->fill($request->except('password')); 
    
                    //filled() para actualizar el password solo si se proporciona.
                if ($request->filled('password')) {
                    $usuario->password = bcrypt($request->password);    // encripta contraseña
                }
                
                $user = Auth::user();

                    // Redirigir según el rol
                    switch ($user->tipoUsuario->tipoUsuario) 
                    {
                        case 'Administrador':
                            $usuario->save();
                            return redirect()->route('consultaUsuaNumDocum')->with('success', 'Usuario Actualizado Exitosamente.');
                        case 'Empleado':
                            // Guardar el usuario en la base de datos
                            $usuario->save();
                            return redirect()->route('consultaUsuaNumDocumE')->with('success', 'Usuario Actualizado Exitosamente.');
                        default:
                        Auth::logout(); // por seguridad

                        //muestra el mensaje de error y lo redirige a la vista de inicio
                        return redirect('/')->withErrors(['email' => 'Rol no válido']);
                    }

        }catch (\Exception $e) {

            return redirect()->route('consultaUsuaNumDocum')->with('error', 'Error al Actualizar usuario: ' . $e->getMessage());

        }
        

    }


    //elimina el usuario
    public function eliminarUsuario($idUsuario) {

        try {

            $usuario = usuarioModels::findOrFail($idUsuario);
            $usuario->delete();

            return redirect()->route('consultaUsuaNumDocum')->with('success', 'Usuario Eliminado Exitosamente.');

        } catch (\Exception $e) {

            return redirect()->route('consultaUsuaNumDocum')->with('error', 'Error al eliminar usuario: ' . $e->getMessage());

        }

    }
    


}
