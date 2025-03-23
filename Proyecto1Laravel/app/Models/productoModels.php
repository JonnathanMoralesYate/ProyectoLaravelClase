<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productoModels extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'idProducto';
    protected $fillable = [
        'nombreProducto',
        'fotoProducto',
        'idTipoProducto'
    ];
    public $timestamps = false;
    
}
