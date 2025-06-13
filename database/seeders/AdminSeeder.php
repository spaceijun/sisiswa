<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'Superadmin']);
        Role::create(['name' => 'Guru']);
        Role::create(['name' => 'Siswa']);
        Role::create(['name' => 'OrangTua']);

        // Superadmin
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'telephone' => '085876550051',
            'email_verified_at' => now(),
            'password' => bcrypt('superadmin'),
            'role' => 'Superadmin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $superadmin->assignRole('Superadmin');

        // Buat user Guru
        $adminDesa = User::create([
            'name' => 'Guru',
            'email' => 'guru@gmail.com',
            'telephone' => '085876550051',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'Guru',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        $adminDesa->assignRole('Guru');

        // Buat user Siswa
        $adminDesa = User::create([
            'name' => 'Siswa',
            'email' => 'siswa@gmail.com',
            'telephone' => '085876550051',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'Siswa',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        $adminDesa->assignRole('Siswa');

        // Buat user Orangtua
        $adminDesa = User::create([
            'name' => 'Ayah',
            'email' => 'orangtua@gmail.com',
            'telephone' => '085876550051',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'OrangTua',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        $adminDesa->assignRole('OrangTua');
    }
}
