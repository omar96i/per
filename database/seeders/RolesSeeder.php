<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Usuario']);

        
        //Usuario
        Permission::create(['name'=>'User.ver'])->assignRole($role1);
        Permission::create(['name'=>'User.crear'])->assignRole($role1);
        Permission::create(['name'=>'User.editar'])->assignRole($role1);
        Permission::create(['name'=>'User.eliminar'])->assignRole($role1);

        //Dependencia
        Permission::create(['name'=>'Dependencia.ver'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Dependencia.crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Dependencia.editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Dependencia.eliminar'])->syncRoles([$role1,$role2]);

        //Peridodo
        Permission::create(['name'=>'Periodo.ver'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Periodo.crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Periodo.editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Periodo.eliminar'])->syncRoles([$role1,$role2]);

        //Unidades
        Permission::create(['name'=>'Unidades.ver'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Unidades.crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Unidades.editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Unidades.eliminar'])->syncRoles([$role1,$role2]);

        
    }
}
