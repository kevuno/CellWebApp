<?php

use Illuminate\Database\Seeder;

class BodegasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bodegas')->delete();
        
        \DB::table('bodegas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'puebla',
                'ciudad' => 'Puebla de los Angeles',
                'estado' => 'Puebla',
                'pais' => 'México',
                'activa' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'huauchinango',
                'ciudad' => 'Puebla de los Angeles',
                'estado' => 'Puebla',
                'pais' => 'México',
                'activa' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'puebla_2',
                'ciudad' => 'Puebla de los Angeles',
                'estado' => 'Puebla',
                'pais' => 'México',
                'activa' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Tulancingo_1',
                'ciudad' => 'Tulancingo',
                'estado' => 'Hidalgo',
                'pais' => 'México',
                'activa' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
