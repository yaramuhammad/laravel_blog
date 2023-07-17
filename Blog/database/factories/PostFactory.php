<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]);
        }
        return $text;
    }
    
    public function definition(): array
    {
        return [
            'body' => "<p>" . implode("</p><p>",$this->faker->paragraphs(4))."</p>",
            'author_id' => $this->faker->numberBetween(1,5),
            'category_id' => $this->faker->numberBetween(1,10),
            'excerpt' => $this->limit_text($this->faker->paragraph(),10),
            'title' => $this->limit_text($this->faker->sentence(),3),
        ];
    }
}
