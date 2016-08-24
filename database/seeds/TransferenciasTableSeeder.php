<?php

use Illuminate\Database\Seeder;

class TransferenciasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transferencias')->delete();
        
        \DB::table('transferencias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'inventario_id' => 18,
                'estatus' => 'A',
                'fecha_solicitud' => '2016-08-12 00:06:46',
                'fecha_llegada' => '0000-00-00 00:00:00',
                'bodega_origen' => '4',
                'bodega_destino' => '3',
                'transferido_por' => 'Kevin',
                'recibido_por' => '',
                'created_at' => '2016-08-12 03:47:08',
                'updated_at' => '2016-08-12 03:47:08',
                'transferencia_grupo' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'inventario_id' => 9,
                'estatus' => 'A',
                'fecha_solicitud' => '2016-08-12 16:09:48',
                'fecha_llegada' => '0000-00-00 00:00:00',
                'bodega_origen' => '2',
                'bodega_destino' => '3',
                'transferido_por' => 'Bodeguero',
                'recibido_por' => '',
                'created_at' => '2016-08-12 16:09:48',
                'updated_at' => '2016-08-12 16:09:48',
                'transferencia_grupo' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'inventario_id' => 9,
                'estatus' => 'A',
                'fecha_solicitud' => '2016-08-12 18:43:44',
                'fecha_llegada' => '0000-00-00 00:00:00',
                'bodega_origen' => '2',
                'bodega_destino' => '3',
                'transferido_por' => 'Bodeguero',
                'recibido_por' => '',
                'created_at' => '2016-08-12 18:43:44',
                'updated_at' => '2016-08-12 18:43:44',
                'transferencia_grupo' => 0,
            ),
        ));
        
        
    }
}
