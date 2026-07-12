<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Hash as Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Admin VitaGuard',
                'email' => 'admin@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'ADMIN',
                'phone' => '081234567890',
                'address' => 'Surabaya',
                'birth_date' => '1990-01-01',
            ],
            [
                'name' => 'Dr. Budi',
                'email' => 'budi@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'DOCTOR',
                'phone' => '081234567891',
                'address' => 'Surabaya',
                'birth_date' => '1985-05-10',
            ],
            [
                'name' => 'Dr. Siti',
                'email' => 'siti@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'DOCTOR',
                'phone' => '081234567892',
                'address' => 'Malang',
                'birth_date' => '1988-08-15',
            ],
            [
                'name' => 'Kevin Member',
                'email' => 'kevin@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'MEMBER',
                'phone' => '081234567893',
                'address' => 'Sidoarjo',
                'birth_date' => '2002-03-20',
            ],
        ]);
        
    }
}
