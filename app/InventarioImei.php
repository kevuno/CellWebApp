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

    /*
    
     Obetener las garantias de objecto del inventario

	*/
    public function garantias(){
    	return $this->has_many('App\Garantia');
    }

    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','fecha_ingreso','ingresado_por'];

}
