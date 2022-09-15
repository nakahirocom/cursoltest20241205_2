<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SantakuSeeder extends Seeder
{
    public function run()
    {
        DB::table('santaku')->insert([
            'question' => Str::random(10),
            'answer' => Str::random(3),
            'comment' => Str::random(20),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
