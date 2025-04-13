<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estadoReservaModels extends Model
{
    protected $table = 'estado';              
    protected $primaryKey = 'idEstado';       
    protected $fillable = [
        'estado'
    ];
    public $timestamps = false;  

}
