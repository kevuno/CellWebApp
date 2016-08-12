<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    /*
    	Obtener el item del inventario al cual pertenece esta transferencia.
    */
    public function inventario()
    {
        return $this->belongsTo('App\Inventario');
    }

}
