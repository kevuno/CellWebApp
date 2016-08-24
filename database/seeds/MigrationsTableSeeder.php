<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'migration' => '2016_07_29_020922_create_vendedores_table',
                'batch' => 2,
            ),
            3 => 
            array (
                'migration' => '2016_08_03_215215_create_super_admins_table',
                'batch' => 3,
            ),
            4 => 
            array (
                'migration' => '2016_08_03_215805_create_admins_table',
                'batch' => 3,
            ),
            5 => 
            array (
                'migration' => '2016_08_07_193906_entrust_setup_tables',
                'batch' => 4,
            ),
            6 => 
            array (
                'migration' => '2016_08_10_003040_create_inventarios_table',
                'batch' => 5,
            ),
            7 => 
            array (
                'migration' => '2016_08_10_010252_create_transferencias_table',
                'batch' => 5,
            ),
            8 => 
            array (
                'migration' => '2016_08_10_014407_create_garantias_table',
                'batch' => 5,
            ),
            9 => 
            array (
                'migration' => '2016_08_10_021925_create_bodegas_table',
                'batch' => 6,
            ),
            10 => 
            array (
                'migration' => '2016_08_10_045925_add_bodega_column_to_users',
                'batch' => 7,
            ),
            11 => 
            array (
                'migration' => '2016_08_19_013346_transferencia_table_add_transferencia_group_column',
                'batch' => 8,
            ),
        ));
        
        
    }
}
