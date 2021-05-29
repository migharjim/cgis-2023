<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
                'name' => "Administrador",
                'email' => "administrador@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Médico 1",
                'email' => "medico1@medico.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Médico 2",
                'email' => "medico2@medico.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Paciente 1",
                'email' => "paciente1@paciente.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Paciente 2",
                'email' => "paciente2@paciente.com",
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
