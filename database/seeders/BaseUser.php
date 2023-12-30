<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class BaseUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'SuperAdmin20',
            'email' => 'laszlocseik@duelun.com',
            'password' => Hash::make('Superuser20'),
            'role' => 20,
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'GuestAdmin11',
            'email' => 'guestuser11@asd.com',
            'password' => Hash::make('Guestuser11'),
            'role' => 11,
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Testuser1',
            'email' => 'testuser1@asd.com',
            'password' => Hash::make('Testuser1'),
            'role' => 1,
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Testuser5',
            'email' => 'laszlocseik@virginmedia.com',
            'password' => Hash::make('Testuser5'),
            'role' => 5,
            'created_at' => now(),
        ]);

    }
}
