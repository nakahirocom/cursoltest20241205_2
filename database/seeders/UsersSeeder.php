<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'email_verified_at' => now(),
            'password' => '$2y$10$8ZafXpVHLtBCNGOZsPc3w.aVGGvzcj7K72z4qgjoePXffT5DgRKFi', // 11111111
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'naka2 75%',
            'email' => 'naka2@aa',
            'email_verified_at' => now(),
            'password' => '$2y$10$8ZafXpVHLtBCNGOZsPc3w.aVGGvzcj7K72z4qgjoePXffT5DgRKFi', // 11111111
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'naka3 50%',
            'email' => 'naka3@aa',
            'email_verified_at' => now(),
            'password' => '$2y$10$8ZafXpVHLtBCNGOZsPc3w.aVGGvzcj7K72z4qgjoePXffT5DgRKFi', // 11111111
            'remember_token' => Str::random(10),
        ]);
    }
}
