<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            [
                'nuhsa' => "AN1234567890",
                'user_id' => 4,
            ],
            [
                'nuhsa' => "AN1234567891",
                'user_id' => 5,
            ],
        ]);
    }
}
