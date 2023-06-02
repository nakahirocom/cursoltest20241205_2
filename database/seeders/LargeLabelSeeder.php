<?php

namespace Database\Seeders;

use App\Models\LargeLabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LargeLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LargeLabel::create([
            'large_label' => '算数',
        ]);
        LargeLabel::create([
            'large_label' => '仕事',
        ]);
        LargeLabel::create([
            'large_label' => 'プログラミング',
        ]);
    }
}
