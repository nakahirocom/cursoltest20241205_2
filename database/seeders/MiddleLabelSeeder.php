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
            'middle_label' => '1の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '２の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '3の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '4の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '5の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '6の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '7の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '8の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '9の段の九九',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'その他',

        ]);

    }
}
