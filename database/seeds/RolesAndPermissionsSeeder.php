<?php

use Illuminate\Database\Seeder;
use \App\Role;
use \App\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Usurio Administrador'; // optional
        $admin->description  = 'Usuario es capaz de editar y agregar nuevos usuarios'; // optional
        $admin->save();
    }
}
