<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class RiwayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('riwayats')->insert([

            [
                'user_id' => 4,
                'doctor_id' => 1,
                'consultation_id' => 1,
                'result' => 'Disarankan istirahat',
                'booking_date' => '2026-04-01',
            ],
        ]);


    }
}
