<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'article_name' => 'Tips Menjaga Kesehatan Jantung',
                'content' => 'Olahraga rutin dan pola makan sehat sangat penting...',
                'doctor_id' => 2,
                
            ],
            [
                'article_name' => 'Cara Mengatasi Flu',
                'content' => 'Istirahat cukup dan minum air yang banyak...',
                'doctor_id' => 1,
            ],
        ]);
    }
}
