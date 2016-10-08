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

    /*
    
     Obetener la bodega a la cual la transferencia proviene

    */
    public function bod_origen(){
        return $this->belongsTo('App\Bodega','bodega_origen');
    }

    /*
    
     Obetener la bodega destino a la cual la transferencia va

    */
    public function bod_destino(){
        return $this->belongsTo('App\Bodega','bodega_destino');
    }

}
