<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'usuarios.visualizar']);

        Permission::create(['name' => 'usuarios.criar']);

        Permission::create(['name' => 'usuarios.editar']);

        Permission::create(['name' => 'usuarios.excluir']);

    $admin = Role::create(['name' => 'Admin']);

    $admin->givePermissionTo(Permission::all());
    }
}
