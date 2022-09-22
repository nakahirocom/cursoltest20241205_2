<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Santaku;

class SantakuSeeder extends Seeder
{
    public function run()
    {
        Santaku::factory()->count(10)->create();
    }
}
