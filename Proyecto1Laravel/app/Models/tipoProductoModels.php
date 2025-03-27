<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoProductoModels extends Model
{
    protected $table = 'tipoproducto';              // Nombre de la tabla en la BD
    protected $primaryKey = 'idTipoProducto';       // Clave primaria
    protected $fillable = [
        'nombreTipoProducto'
    ];
    public $timestamps = false;                     // Si no usas created_at y updated_at

}
