<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoDocumentoModels extends Model
{
    protected $table = 'tipodocumento'; 
    protected $primaryKey = 'idTipoDocum';
    protected $fillable = [
        'documento'
    ];
    public $timestamps = false; 
    
}
