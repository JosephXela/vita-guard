<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultationMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        DB::table('consultation_messages')->insert([

            [
                'consultation_id' => 1,
                'sender_type' => 'MEMBER',
                'sender_id' => 1,
                'message' => 'Selamat pagi Dok, saya sudah demam sejak tiga hari yang lalu.',
            ],

            [
                'consultation_id' => 1,
                'sender_type' => 'DOCTOR',
                'sender_id' => 1,
                'message' => 'Selamat pagi. Selain demam, apakah ada gejala lain seperti batuk atau pilek?',
            ],

            [
                'consultation_id' => 1,
                'sender_type' => 'MEMBER',
                'sender_id' => 1,
                'message' => 'Iya Dok, saya juga batuk dan tenggorokan terasa sakit.',
            ],

            [
                'consultation_id' => 1,
                'sender_type' => 'DOCTOR',
                'sender_id' => 1,
                'message' => 'Baik. Apakah suhu badan sudah diukur?',
            ],

            [
                'consultation_id' => 1,
                'sender_type' => 'MEMBER',
                'sender_id' => 1,
                'message' => 'Sudah Dok, sekitar 38,5°C.',
            ],

            [
                'consultation_id' => 1,
                'sender_type' => 'DOCTOR',
                'sender_id' => 1,
                'message' => 'Kemungkinan infeksi saluran pernapasan atas. Saya sarankan istirahat, banyak minum air putih, dan konsumsi paracetamol bila demam. Jika dalam 3 hari tidak membaik atau muncul sesak napas, segera datang ke rumah sakit.',
            ],
        ]);
    }
}
