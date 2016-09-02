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
        

        $this->call('InventariosTableSeeder');
        $this->call('GarantiasTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('TransferenciasTableSeeder');
    }
}