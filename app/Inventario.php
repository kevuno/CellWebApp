<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    /*

     Obetener las transferencias de objecto del inventario

	*/
    public function transferencias(){
    	return $this->has_many('App\Transferencia');
    }

    /*
    
     Obetener las garantias de objecto del inventario

	*/
    public function garantias(){
    	return $this->has_many('App\Garantia');
    }

    /*
    
     Obetener la bodega a la cual el objecto del inventario pertenece

    */
    public function bodega(){
        return $this->belongsTo('App\Bodega');
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','fecha_ingreso','ingresado_por'];
}
