<?php

use Illuminate\Database\Seeder;

class InventariosImeiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
        \DB::table('inventarioimeis')->delete();
        
        \DB::table('inventarioimeis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'imei' => 1232312312,
                'estatus' => 'I',
                'modelo' => 'L87',
                'marca' => 'F2',
                'bodega_id' => '3',
                'fecha_ingreso' => '2016-08-10 00:00:00',
                'ingresado_por' => 'Bodeguero',
                'precio_min' => 100,
                'precio_max' => 192,
                'created_at' => '2016-08-10 06:54:21',
                'updated_at' => '2016-08-10 06:54:21',
            ),
            1 => 
            array (
                'id' => 2,
                'imei' => 1232221232,
                'estatus' => 'I',
                'modelo' => 'asdadasd',
                'marca' => 'adasd',
                'bodega_id' => '4',
                'fecha_ingreso' => '2016-08-12 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 123,
                'precio_max' => 123,
                'created_at' => '2016-08-10 21:18:44',
                'updated_at' => '2016-08-12 02:31:12',
            ),
            2 => 
            array (
                'id' => 3,
                'imei' => 2147483647,
                'estatus' => 'I',
                'modelo' => 'Bestia',
                'marca' => 'Diablo',
                'bodega_id' => '4',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 699,
                'precio_max' => 999,
                'created_at' => '2016-08-11 00:51:58',
                'updated_at' => '2016-08-11 00:51:58',
            ),
            3 => 
            array (
                'id' => 4,
                'imei' => 1234567890,
                'estatus' => 'I',
                'modelo' => 'L87',
                'marca' => 'F2',
                'bodega_id' => '2',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 25,
                'precio_max' => 50,
                'created_at' => '2016-08-11 01:42:17',
                'updated_at' => '2016-08-11 01:42:17',
            ),
            4 => 
            array (
                'id' => 6,
                'imei' => 1234567899,
                'estatus' => 'I',
                'modelo' => 'L87',
                'marca' => 'F2',
                'bodega_id' => '2',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 0,
                'precio_max' => 90,
                'created_at' => '2016-08-11 02:02:10',
                'updated_at' => '2016-08-11 02:02:10',
            ),
            5 => 
            array (
                'id' => 8,
                'imei' => 1230123012,
                'estatus' => 'I',
                'modelo' => 'S2',
                'marca' => 'Nokia',
                'bodega_id' => '2',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 0,
                'precio_max' => 200,
                'created_at' => '2016-08-11 02:05:00',
                'updated_at' => '2016-08-11 02:05:00',
            ),
            6 => 
            array (
                'id' => 9,
                'imei' => '6161616161',
                'estatus' => 'T',
                'modelo' => 'Pedro',
                'marca' => 'Diablo',
                'bodega_id' => '2',
                'fecha_ingreso' => '2016-08-12 12:09:48',
                'ingresado_por' => 'Kevin',
                'precio_min' => 0,
                'precio_max' => 200,
                'created_at' => '2016-08-11 02:14:58',
                'updated_at' => '2016-08-12 16:09:48',
            ),
            7 => 
            array (
                'id' => 12,
                'imei' => '6546546324',
                'estatus' => 'I',
                'modelo' => 'Pedro',
                'marca' => 'Diablo',
                'bodega_id' => '2',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Bodeguero',
                'precio_min' => 40,
                'precio_max' => 100,
                'created_at' => '2016-08-11 20:32:33',
                'updated_at' => '2016-08-11 23:50:41',
            ),
            8 => 
            array (
                'id' => 13,
                'imei' => '9997776661',
                'estatus' => 'I',
                'modelo' => 'Roberto',
                'marca' => 'Diablo',
                'bodega_id' => '1',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 999,
                'precio_max' => 1999,
                'created_at' => '2016-08-11 20:34:17',
                'updated_at' => '2016-08-11 20:34:17',
            ),
            9 => 
            array (
                'id' => 14,
                'imei' => '2383703748',
                'estatus' => 'I',
                'modelo' => 'S7',
                'marca' => 'Nokia',
                'bodega_id' => '3',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 888,
                'precio_max' => 999,
                'created_at' => '2016-08-11 20:35:36',
                'updated_at' => '2016-08-11 20:35:36',
            ),
            10 => 
            array (
                'id' => 15,
                'imei' => '5435435432',
                'estatus' => 'I',
                'modelo' => 'M67',
                'marca' => 'LG',
                'bodega_id' => '4',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 999,
                'precio_max' => 1000,
                'created_at' => '2016-08-11 20:38:03',
                'updated_at' => '2016-08-11 20:38:03',
            ),
            11 => 
            array (
                'id' => 16,
                'imei' => '5435435404',
                'estatus' => 'I',
                'modelo' => 'M67',
                'marca' => 'LG',
                'bodega_id' => '4',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 233,
                'precio_max' => 1000,
                'created_at' => '2016-08-11 21:20:29',
                'updated_at' => '2016-08-11 23:37:56',
            ),
            12 => 
            array (
                'id' => 17,
                'imei' => 1230123019,
                'estatus' => 'I',
                'modelo' => 'S3',
                'marca' => 'Nokia',
                'bodega_id' => '4',
                'fecha_ingreso' => '2016-08-11 00:00:00',
                'ingresado_por' => 'Kevin',
                'precio_min' => 0,
                'precio_max' => 200,
                'created_at' => '2016-08-11 22:34:56',
                'updated_at' => '2016-08-11 23:45:19',
            ),
            13 => 
            array (
                'id' => 18,
                'imei' => 1234441212,
                'estatus' => 'T',
                'modelo' => 'L87',
                'marca' => 'F2',
                'bodega_id' => '4',
                'fecha_ingreso' => '2016-08-11 23:45:19',
                'ingresado_por' => 'Kevin',
                'precio_min' => 333,
                'precio_max' => 444,
                'created_at' => '2016-08-12 03:32:07',
                'updated_at' => '2016-08-12 03:45:19',
            ),
        ));
        
        
    }
}
