<?php

use App\Quizz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 10) as $id) {
            Quizz::insert([
                'id' => $id,
                'name' => $faker->sentence(3),
                'disp_from'=>now(),
                'disp_to'=>Carbon::now()->addHours(12),
                'duration'=>60,
                'teacher_id'=>1,
            ]);
        }
    }
}
