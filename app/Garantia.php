<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garantia extends Model
{
    /*
    	Obtener el item del inventario al cual pertenece esta garantia.
    */
    public function inventario()
    {
        return $this->belongsTo('App\Inventario');
    }
}
