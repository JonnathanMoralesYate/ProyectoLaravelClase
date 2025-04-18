<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservaModels extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'idReserva';
    protected $fillable = [
        'idUsuario',
        'idHabitacion',
        'fechaInicio',
        'fechaFin',
        'idEstado'
    ];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo('App\Models\usuarioModels', 'idUsuario', 'idUsuario');
    }

    public function habitacion()
    {
        return $this->belongsTo('App\Models\habitacionesModels', 'idHabitacion', 'idHabitacion');
    }

    public function estadoReserva()
    {
        return $this->belongsTo('App\Models\estadoReservaModels', 'idEstado', 'idEstado');
    }


}
