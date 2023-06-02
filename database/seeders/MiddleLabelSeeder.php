<?php

namespace Database\Seeders;

use App\Models\MiddleLabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MiddleLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '足し算',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '引き算',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '掛け算',

        ]);
        MiddleLabel::create([
            'large_label_id' => 2,
            'middle_label' => '法人税',

        ]);
        MiddleLabel::create([
            'large_label_id' => 2,
            'middle_label' => '消費税',

        ]);
        MiddleLabel::create([
            'large_label_id' => 2,
            'middle_label' => '相続知財業務',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => '会社のルール',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'php',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'laravel',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'ショートカットキー',

        ]);
    }
}
