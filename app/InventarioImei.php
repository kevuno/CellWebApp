<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarioImei extends Model
{
    
    /*
    
     Obetener la bodega a la cual el objecto del inventario pertenece

    */
    public function bodega(){
        return $this->belongsTo('App\Bodega');
    }
}
