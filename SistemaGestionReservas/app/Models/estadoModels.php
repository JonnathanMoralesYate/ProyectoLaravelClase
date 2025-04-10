<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estadoModels extends Model
{
    protected $table = 'estado';              
    protected $primaryKey = 'idEstado';       
    protected $fillable = [
        'estado'
    ];
    public $timestamps = false; 
    
}
