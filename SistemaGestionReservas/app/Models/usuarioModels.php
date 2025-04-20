<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class usuarioModels extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    protected $fillable = [
        'idTipoDocum',
        'numDocum',
        'nombre',
        'apellido',
        'idTipoUsua',
        'permiso',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
    
    public $timestamps = false;

    // Relación con TipoDocumento
    public function tipoDocumento()
    {
        return $this->belongsTo('App\Models\tipoDocumentoModels', 'idTipoDocum', 'idTipoDocum');
    }

    // Relación con TipoUsuario
    public function tipoUsuario()
    {
        return $this->belongsTo('App\Models\tipoUsuarioModels', 'idTipoUsua', 'idTipoUsua');
    }


}
