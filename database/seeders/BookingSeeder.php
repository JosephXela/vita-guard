<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 4,
                'doctor_id' => 1,
                'booking_date' => '2026-04-10',
                'booking_time' => '08:00:00',
                'status' => 'APPROVED',
                'notes' => 'Segera jawab ya Dok, anak saya sakit parah.',
            ],
            [
                'user_id' => 4,
                'doctor_id' => 1,
                'booking_date' => '2026-03-15',
                'booking_time' => '09:00:00',
                'status' => 'DONE',
                'notes' => 'Pasien mengeluh demam tinggi selama 3 hari',
            ],
        ]);
    }
}
