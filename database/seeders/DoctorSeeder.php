<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('doctors')->insert([
            [
                'user_id' => 2,
                'image' => 'img/doctors/drbudi.png',
                'specialization' => 'Jantung',
                'years_experience' => '5 tahun',
            ],
            [
                'user_id' => 3,
                'image' => 'img/doctors/drsiti.png',
                'specialization' => 'Umum',
                'years_experience' => '3 tahun',
            ],
        ]);
    }
}
