<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    /*
    
     Obetener los usuarios de la bodega

	*/
    public function users(){
    	return $this->hasMany('App\User');
    }

    /*
    
     Obetener los usuarios de la bodega

	*/
    public function inventario(){
    	return $this->hasMany('App\Inventario');
    }
}
