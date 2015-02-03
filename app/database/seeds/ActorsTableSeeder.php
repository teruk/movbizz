<?php
use Illuminate\Database\Seeder;
use MovBizz\Persons\Actor;
use Faker\Factory as Faker;

class ActorsTableSeeder  extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,75) as $index)
        {
            $talent = $faker->numberBetween(1,10);
            Actor::create([
                'firstname' => $faker->firstName(),
                'name' => $faker->lastName,
                'talent' => $talent,
                'wage' => $faker->numberBetween((100000 * $talent), (250000 + log($talent) * 450000)),
            ]);
        }
    }

}