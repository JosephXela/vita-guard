<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        DB::table('consultations')->insert([
            [
                'booking_id' => 1,
                'status' => 'ACTIVE',
                'started_at' => now(),
                'ended_at' => null,
                'summary' => null,
            ],
            [
                'booking_id' => 2,
                'status' => 'CLOSED',
                'started_at' => '2026-03-15 09:00:00',
                'ended_at' => '2026-03-15 09:30:00',
                'summary' => 'Pasien didiagnosis demam berdarah ringan, disarankan istirahat dan minum banyak cairan.',
            ],
        ]);
    }
}
