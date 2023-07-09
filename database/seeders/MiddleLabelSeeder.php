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

//large_label_idが1のひかり税理士法人の大分類

        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => 'ひかり税理士ルール',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '福岡事務所ルール',

        ]);
        MiddleLabel::create([
            'large_label_id' => 1,
            'middle_label' => '相続・贈与税',
        ]);

            MiddleLabel::create([
                'large_label_id' => 1,
                'middle_label' => '知財スキル',
    
            ]);
            MiddleLabel::create([
                'large_label_id' => 1,
                'middle_label' => '知財営業',
    
            ]);
            MiddleLabel::create([
                'large_label_id' => 1,
                'middle_label' => '検査メモ_法人',
    
            ]);
        
            MiddleLabel::create([
                'large_label_id' => 1,
                'middle_label' => '検査メモ_個人',
    
            ]);

//large_label_idが2の必要な資格の大分類

            MiddleLabel::create([
                'large_label_id' => 2,
                'middle_label' => '簿記２級',
    
            ]);
            MiddleLabel::create([
                'large_label_id' => 2,
                'middle_label' => '全経相続税',
    
            ]);
            MiddleLabel::create([
                'large_label_id' => 2,
                'middle_label' => '全経消費税',
    
            ]);


        MiddleLabel::create([
            'large_label_id' => 2,
            'middle_label' => '全経法人税',

        ]);
        MiddleLabel::create([
            'large_label_id' => 2,
            'middle_label' => '全経所得税',

        ]);
        MiddleLabel::create([
            'large_label_id' => 2,
            'middle_label' => '社会保険',

        ]);

//large_label_idが3のシステム系の大分類


        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'エクセル',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'ワード',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'パワーポイント',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'salesforce',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => '会計freee',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => '給与freee',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => '秀丸メール',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'DocuWorks',

        ]);

        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => '人事労務freee',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'Laravel',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'php',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'SQL',

        ]);
        MiddleLabel::create([
            'large_label_id' => 3,
            'middle_label' => 'VScode',

        ]);

//large_label_idが4のその他の大分類
        MiddleLabel::create([
            'large_label_id' => 4,
            'middle_label' => '足し算',

        ]);
        MiddleLabel::create([
            'large_label_id' => 4,
            'middle_label' => '引き算',

        ]);
        MiddleLabel::create([
            'large_label_id' => 4,
            'middle_label' => '掛け算',

        ]);



    }
}
