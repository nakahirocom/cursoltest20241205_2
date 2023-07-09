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
            'large_label' => 'ひかり税理士',
        ]);
        LargeLabel::create([
            'large_label' => '必要な資格',
        ]);
        LargeLabel::create([
            'large_label' => 'システム系',
        ]);
        LargeLabel::create([
            'large_label' => 'その他',
        ]);
        LargeLabel::create([
            'large_label' => '予備1',
        ]);
        LargeLabel::create([
            'large_label' => '予備2',
        ]);
        LargeLabel::create([
            'large_label' => '予備3',
        ]);
        LargeLabel::create([
            'large_label' => '予備4',
        ]);
        LargeLabel::create([
            'large_label' => '予備5',
        ]);




    }
}
