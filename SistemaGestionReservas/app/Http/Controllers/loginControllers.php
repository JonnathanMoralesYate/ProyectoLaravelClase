<?php

namespace App\Http\Controllers;
use App\Models\tipoDocumentoModels;
use App\Models\usuarioModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginControllers extends Controller
{
    //Muestra la vista de login
    public function login()
    {
        return view('auth.login');
    }

    //Muestra la vista de registro
    public function registro()
    {
        $tiposDocum = tipoDocumentoModels::all();
        return view('auth.registro', compact('tiposDocum'));
    }

    //Metodo autenticacion
    public function iniciarSeccion(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //dd($credentials);

        if (Auth::attempt($credentials)) 
        {
            $user = Auth::user();

            //dd($user);

            if($user->permiso)
            {
                //dd($user->permiso);

                // Redirigir según el rol
                switch ($user->tipoUsuario->tipoUsuario) {
                    case 'Administrador':
                        return redirect()->intended('/admin/dashboard');
                    case 'Empleado':
                        return redirect()->intended('/employee/dashboard');
                    case 'Cliente':
                        return redirect()->intended('/users/dashboard');

                default:
                Auth::logout(); // por seguridad

                //muestra el mensaje de error y lo redirige a la vista de inicio
                return redirect('/')->withErrors(['email' => 'Rol no válido']);
            }

            }else {
                Auth::logout(); // por seguridad

                //muestra el mensaje de error y lo redirige a la vista de inicio
                return redirect('/')->withErrors(['email' => 'Usuario inactivo']);
            }

        }

        // si las credenciales no son válidas, muestra el mensaje de error y queda en la vista de login
        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.',]);
    }

    //Metodo para cerrar sesion
    //Este metodo cierra la sesion del usuario y lo redirige a la vista de inicio
    public function cerrarSesion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function registroUsuario(Request $request) {

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

                $usuario->save();

                return redirect()->route('login')->with('success', 'Registrado Exitosamente.');
                        

            } catch (\Exception $e) {

                return redirect()->route('registroUsua')->with('error', 'Error al guardar: ' . $e->getMessage());

            }

    }

}
