<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Invitado']);
        /* instances */
        Permission::create(['name' => 'instances', 'description' => 'Ver menú instancia'])->syncRoles([$role1]);
        /* areas */
        Permission::create(['name' => 'areas.index', 'description' => 'Permisos de la área de conocimientos'])->syncRoles([$role1]);
        /* giros */
        Permission::create(['name' => 'giros.index', 'description' => 'Permisos de giro'])->syncRoles([$role1]);
        /* scopes */
        Permission::create(['name' => 'scopes.index', 'description' => 'Permisos de alcance'])->syncRoles([$role1]);
        /* sectors */
        Permission::create(['name' => 'sectors.index', 'description' => 'Permisos de sectores'])->syncRoles([$role1]);
        /* types-scopes */
        Permission::create(['name' => 'types-scopes.index', 'description' => 'Permisos de tipo de sector'])->syncRoles([$role1]);
        /* sizes */
        Permission::create(['name' => 'sizes.index', 'description' => 'Permisos de tamaños de instancias'])->syncRoles([$role1]);
        /* instances */
        Permission::create(['name' => 'instances.index', 'description' => 'Ver opción de instancias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'instances.create', 'description' => 'Crear instancias'])->syncRoles([$role1]);
        Permission::create(['name' => 'instances.edit', 'description' => 'Editar instancias'])->syncRoles([$role1]);
        Permission::create(['name' => 'instances.show', 'description' => 'Ver convenios por instancias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'instances.destroy', 'description' => 'Eliminar instancias'])->syncRoles([$role1]);
        /* instances */
    }
}
