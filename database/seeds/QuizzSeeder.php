<?php

use Illuminate\Database\Seeder;

class QuizzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

           QuizzesTableSeeder::class,
            QuestionsTableSeeder::class,
            OptionsTableSeeder::class,
        ]);
    }
}
