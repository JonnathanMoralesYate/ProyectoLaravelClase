<?php

namespace App\Http\Controllers;
use App\Models\tipoDocumentoModels;
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



}
