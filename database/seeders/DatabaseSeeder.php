<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'nip' => '123456789012345678',
            'jabatan' => 'Admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Head Office',
            'nip' => '234567890123456789',
            'jabatan' => 'Head Office',
            'password' => Hash::make('headoffice'),
            'role' => 'head',
        ]);

        DB::table('users')->insert([
            'name' => 'Staff',
            'nip' => '345678901234567890',
            'jabatan' => 'Staff',
            'password' => Hash::make('staff1'),
            'role' => 'staff',
        ]);
    }
}
