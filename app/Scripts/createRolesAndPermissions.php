<?php
use App\Role;
use App\Permission;

echo getcwd();
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Usurio Administrador'; // optional
        $admin->description  = 'Usuario es capaz de editar y agregar nuevos usuarios'; // optional
        $admin->save();

?>
