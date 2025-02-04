<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1, // 問題を作成したユーザーのIDをデフォルトで1とする
            'question' => $this->faker->realText(10),
            'answer' => $this->faker->realText(15),
            'comment' => $this->faker->realText(20),
            'created_at' => Carbon::now()->yesterday(),
            'updated_at' => now()
        ];
    }
}
