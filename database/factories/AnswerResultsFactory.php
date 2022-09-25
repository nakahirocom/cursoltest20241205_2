<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer_results>
 */
class AnswerResultsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // faktory.phpは、seedersで直接php記述したので、リアルな例を入れるまで使用しない。
            'user_id' => $this->faker->numberBetween(1,3),
            'question_id' => $this->faker->numberBetween(3,19),
            'answered_question_id' => $this->faker->numberBetween(3,19),
            'created_at' => now(),  //この行を追加
            'updated_at' => now(),  //この行を追加

        ];
    }
}
