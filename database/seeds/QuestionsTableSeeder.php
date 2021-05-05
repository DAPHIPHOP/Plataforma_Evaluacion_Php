<?php

use App\Question;
use App\Quizz;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = Quizz::all();

        foreach($categories as $category)
        {
            foreach(range(1,2) as $index)
            {
                $category->quizzQuestions()->create([
                    'question_text' => $faker->sentence(4),
                    'points'=>1
                ]);
            }
        }
    }
}
