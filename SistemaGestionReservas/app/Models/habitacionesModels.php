<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class habitacionesModels extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'idHabitacion';
    protected $fillable = [
        'numero',
        'idTipoHabi',
        'precio'
    ];
    public $timestamps = false;

    public function tipoHabitacion()
    {
        return $this->belongsTo('App\Models\tipoHabitacionModels', 'idTipoHabi', 'idTipoHabi');
    }   

}
