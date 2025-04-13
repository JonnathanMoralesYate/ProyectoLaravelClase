<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoUsuarioModels extends Model
{
    protected $table = 'tipousuario'; 
    protected $primaryKey = 'idTipoUsua';
    protected $fillable = [
        'tipoUsuario'
    ];
    public $timestamps = false; 
    
    
}
