<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoHabitacionModels extends Model
{
    protected $table = 'tipohabitacion';              
    protected $primaryKey = 'idTipoHabi';       
    protected $fillable = [
        'tipoHabi'
    ];
    public $timestamps = false;   

}
