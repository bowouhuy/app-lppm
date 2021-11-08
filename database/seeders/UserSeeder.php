<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'dosen',
                'first_name' => 'dosen',
                'last_name' => 'tes',
                'email' => 'dosen@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'dosen'
            ],
            [
                'username' => 'lppm',
                'first_name' => 'lppm',
                'last_name' => 'tes',
                'email' => 'lppm@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'lppm'
            ],
            [
                'username' => 'reviewer',
                'first_name' => 'reviewer',
                'last_name' => 'tes',
                'email' => 'reviewer@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'reviewer'
            ]
        ]);
    }
}
