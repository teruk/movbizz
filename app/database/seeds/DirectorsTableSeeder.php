<?php
use Illuminate\Database\Seeder;
use MovBizz\Persons\Director;
use Faker\Factory as Faker;

class DirectorsTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,50) as $index)
        {
            $talent = $faker->numberBetween(1,10);
            Director::create([
                'firstname' => $faker->firstName(),
                'name' => $faker->lastName,
                'talent' => $talent,
                'wage' => $faker->numberBetween((100000 * $talent), (250000 + log($talent) * 600000)),
            ]);
        }
    }

}