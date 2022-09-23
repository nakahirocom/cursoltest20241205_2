<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'naka1 100%',
            'email' => 'naka1@aa',
            'password' => 11111111,
        ]);
        User::create([
            'name' => 'naka2 75%',
            'email' => 'naka2@aa',
            'password' => 11111111,
        ]);
        User::create([
            'name' => 'naka3 50%',
            'email' => 'naka3@aa',
            'password' => 11111111,
        ]);
    }
}
