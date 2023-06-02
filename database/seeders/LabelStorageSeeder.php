<?php

namespace Database\Seeders;

use App\Models\LabelStorages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 1,
            'middle_label_id' => 1,
            'select' => 1,
        ]);
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 1,
            'middle_label_id' => 2,
            'select' => 1,
        ]);
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 1,
            'middle_label_id' => 3,
            'select' => 1,
        ]);
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 2,
            'middle_label_id' => 4,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 2,
            'middle_label_id' => 5,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 2,
            'middle_label_id' => 6,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 3,
            'middle_label_id' => 7,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 3,
            'middle_label_id' => 8,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 1,
            'large_label_id' => 3,
            'middle_label_id' => 9,
            'select' => 0,
        ]);

        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 1,
            'middle_label_id' => 1,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 1,
            'middle_label_id' => 2,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 1,
            'middle_label_id' => 3,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 2,
            'middle_label_id' => 4,
            'select' => 1,
        ]);
        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 2,
            'middle_label_id' => 5,
            'select' => 1,
        ]);
        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 2,
            'middle_label_id' => 6,
            'select' => 1,
        ]);
        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 3,
            'middle_label_id' => 7,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 3,
            'middle_label_id' => 8,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 2,
            'large_label_id' => 3,
            'middle_label_id' => 9,
            'select' => 0,
        ]);

        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 1,
            'middle_label_id' => 1,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 1,
            'middle_label_id' => 2,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 1,
            'middle_label_id' => 3,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 2,
            'middle_label_id' => 4,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 2,
            'middle_label_id' => 5,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 2,
            'middle_label_id' => 6,
            'select' => 0,
        ]);
        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 3,
            'middle_label_id' => 7,
            'select' => 1,
        ]);
        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 3,
            'middle_label_id' => 8,
            'select' => 1,
        ]);
        LabelStorages::create([
            'user_id' => 3,
            'large_label_id' => 3,
            'middle_label_id' => 9,
            'select' => 1,
        ]);
    }
}
