<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoProductoModels extends Model
{
    protected $table = 'tipoproducto';
    protected $primaryKey = 'idTipoProducto';
    protected $fillable = [
        'nombreTipoProducto'
    ];
    public $timestamps = false;
}
