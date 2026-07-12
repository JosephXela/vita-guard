<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('doctor_schedules')->insert([
            [
                'doctor_id' => 1,
                'day' => 'Senin',
                'start_time' => '08:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'doctor_id' => 2,
                'day' => 'Selasa',
                'start_time' => '13:00:00',
                'end_time' => '17:00:00',
            ],
        ]);
    }
}
