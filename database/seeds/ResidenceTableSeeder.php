<?php

use Illuminate\Database\Seeder;
use App\Residences;
class ResidenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();
       for ($i=0; $i < 20; $i ++){
           Residences::create([
               "comp_name" => $faker->comp_name,
               "comp_age" => $faker->comp_age,
               "comp_name" => $faker->comp_name,
               "comp_name" => $faker->comp_name,
           ]);
       }
    }
}
