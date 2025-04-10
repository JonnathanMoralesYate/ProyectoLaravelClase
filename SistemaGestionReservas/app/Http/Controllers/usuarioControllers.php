<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipoDocumentoModels;
use App\Models\tipoUsuarioModels;

class usuarioControllers extends Controller
{

     //muestra el formulario para eliminar producto
    public function registroUsua() {
        $tiposDocum = TipoDocumentoModels::all();
        $tiposUsua = TipoUsuarioModels::all();
        return view('admin.users.registroUsua', compact('tiposDocum', 'tiposUsua'));
        
    }


}
