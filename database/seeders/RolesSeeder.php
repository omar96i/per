<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        // roles
        Permission::create(['name'=>'Roles.ver'])->assignRole($role1);
        Permission::create(['name'=>'Roles.crear'])->assignRole($role1);
        Permission::create(['name'=>'Roles.editar'])->assignRole($role1);
        Permission::create(['name'=>'Roles.eliminar'])->assignRole($role1);

        //Administracion
        Permission::create(['name'=>'Administracion.ver'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Administracion.crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Administracion.editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Administracion.eliminar'])->syncRoles([$role1,$role2]);

        // Programacion
        Permission::create(['name'=>'Programacion.ver'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Programacion.crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Programacion.editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Programacion.eliminar'])->syncRoles([$role1,$role2]);

        //PlanOperativo
        Permission::create(['name'=>'PlanOperativo.ver'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'PlanOperativo.crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'PlanOperativo.editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'PlanOperativo.eliminar'])->syncRoles([$role1,$role2]);

        //resultados
        Permission::create(['name'=>'Resultados.ver'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Resultados.crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Resultados.editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'Resultados.eliminar'])->syncRoles([$role1,$role2]);

        $admin = User::create([
            'nombre' => 'admin',
            'apellido' => 'admin',
            'email' => 'admin@hotmail.com',
            'documento' => '12345',
            'usuario' => 'admin',
            'password' => '12345',
        ]);
        // $admin->assignRole($role1);

        $usuario = User::create([
            'nombre' => 'felipe',
            'apellido' => 'felipe',
            'email' => 'felipe@hotmail.com',
            'documento' => '12345',
            'usuario' => 'felipe',
            'password' => '12345',
        ]);
        // $usuario->assignRole($role2);


    }
}
