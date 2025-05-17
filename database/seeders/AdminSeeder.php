<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Superadmin',
                'email' => 'superadmin@gmail.com',
                'telephone' => '085876550051',
                'email_verified_at' => now(),
                'password' => Hash::make('superadmin'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'Admin',
            ],
        ]);
    }
}
