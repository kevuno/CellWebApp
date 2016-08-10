<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodegas')->insert([
            'nombre' => "huauchinango",
            'ciudad' => "Puebla de los Angeles",
            'estado' => "Puebla",
            'pais' => "México",
            'activa' => true,
            
        ]);

        DB::table('bodegas')->insert([
            'nombre' => "puebla_2",
            'ciudad' => "Puebla de los Angeles",
            'estado' => "Puebla",
            'pais' => "México",
            'activa' => false,
            
        ]);

        DB::table('bodegas')->insert([
            'nombre' => "Tulancingo_1",
            'ciudad' => "Tulancingo",
            'estado' => "Hidalgo",
            'pais' => "México",
            'activa' => true,
            
        ]);

    }
}
