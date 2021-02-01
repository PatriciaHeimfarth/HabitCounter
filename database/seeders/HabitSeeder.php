<?php

namespace Database\Seeders;
use App\Models\Habits;
use Illuminate\Database\Seeder;

class HabitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        
        for ($i = 0; $i < 5; $i++) {
            habits::create([
                'name' => $faker->text,
 
                'streak' => $faker->randomNumber(2),
             
            ]);
        }
    }
}
