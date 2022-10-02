<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Importar modelo de Roles y Permisos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles del Sistema
        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'empleado']);
        $role3 = Role::create(['name' => 'cliente']);

        // Los Permisos es recomendable poner nombre de las rutas
        // Permission::create(['name' => 'admi.home'])->syncRoles([$role1]);
        // Permission::create(['name' => 'user.index'])->syncRoles([$role1]);
        // Permission::create(['name' => 'user.create'])->syncRoles([$role1]);
        // Permission::create(['name' => 'user.edit'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'user.destroy'])->syncRoles([$role1]);
        // Permission::create(['name' => 'empleado.index'])->syncRoles([$role1]);
        // Permission::create(['name' => 'empleado.create'])->syncRoles([$role1, $role3]);
        // Permission::create(['name' => 'empleado.edit'])->syncRoles([$role1]);
        // Permission::create(['name' => 'empleado.destroy'])->syncRoles([$role1]);
        // Permission::create(['name' => 'reclamo.index'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'reclamo.create'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'reclamo.edit'])->syncRoles([$role1]);
        // Permission::create(['name' => 'reclamo.destroy'])->syncRoles([$role1]);
        
    }
}
