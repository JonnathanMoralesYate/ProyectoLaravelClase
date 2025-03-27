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

    
    public function tipoProducto() {

        return $this->belongsTo('App\tipoProductoModels', 'idTipoProducto', 'idTipoProducto');
        //el primer idTipoProducto es la foreign key
        //y el segundo idTipoProducto es la primary key de la tabla tipoProducto
    }

    /*  tipoProducto(): Es el nombre de la función, que define una relación entre dos modelos en Laravel.

        $this->belongsTo('App\tipoProductoModels', 'idTipoProducto', 'idTipoProducto'):

        belongsTo(): Método de Eloquent que define una relación de pertenencia entre este modelo y otro.

        'App\tipoProductoModels': Especifica el modelo al que pertenece esta relación (el modelo tipoProductoModels).

        'idTipoProducto' (primer parámetro): Es la clave foránea en la tabla actual que referencia la tabla tipoProductoModels.

        'idTipoProducto' (segundo parámetro): Es la clave primaria en la tabla tipoProductoModels que se relaciona con la clave foránea.

        Resumen
        Esta función establece una relación uno a muchos (inversa) entre el modelo actual y el modelo tipoProductoModels.
        Cada registro en la tabla actual pertenece a un único tipo de producto en tipoProductoModels, vinculado a través de la columna idTipoProducto.
    */
    
}
