<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'owner',
                'display_name' => 'Dueño del proyecto',
                'description' => 'Usuario es el dueño del proyecto',
                'created_at' => '2016-08-08 18:18:18',
                'updated_at' => '2016-08-08 18:18:18',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'admin',
                'display_name' => 'Usurio Administrador',
                'description' => 'Usuario es capaz de editar y agregar nuevos usuarios',
                'created_at' => '2016-08-08 18:30:46',
                'updated_at' => '2016-08-08 18:32:17',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'bodega',
                'display_name' => 'Trabajador de Bodega',
                'description' => 'Usuario es capaz de editar y agregar inventario, y crear transferencias ',
                'created_at' => '2016-08-08 19:22:43',
                'updated_at' => '2016-08-08 19:22:43',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'garantia',
                'display_name' => 'Administrador de garantias',
                'description' => 'Usuario es capaz de editar, agregar y aceptar garantias ',
                'created_at' => '2016-08-08 19:29:00',
                'updated_at' => '2016-08-08 19:29:00',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'vendedor',
                'display_name' => 'Vendedor de equipos',
                'description' => 'Usuario es capaz de crear y ver ordenes de comprar',
                'created_at' => '2016-08-08 19:30:57',
                'updated_at' => '2016-08-08 19:30:57',
            ),
        ));
        
        
    }
}
