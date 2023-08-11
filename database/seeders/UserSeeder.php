<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'admin',
            'apellido'=>'admin',
            'email' => 'admin@hotmail.com',
            'documento'=>'12345',
            'usuario'=>'admin',
            'password' => bcrypt('12345'),
            // 'tipo_acceso'=>'admin',
            'remember_token'=>NULL,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		]);
    }
}
