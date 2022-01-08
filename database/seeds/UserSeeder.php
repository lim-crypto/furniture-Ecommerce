<?php

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
        //
        DB::table('users')->insert([
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'isAdmin' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'first_name' => 'user',
                'last_name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user'),
                'isAdmin' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
