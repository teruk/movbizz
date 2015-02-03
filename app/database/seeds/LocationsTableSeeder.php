<?php
use Illuminate\Database\Seeder;
use MovBizz\Locations\Location;
use Faker\Factory as Faker;

class LocationsTableSeeder  extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,12) as $index)
        {
            $quality = $faker->numberBetween(1,10);
            Location::create([
                'name' => $faker->city,
                'quality' => $quality,
                'rent' => $faker->numberBetween((100000 * $quality), (250000 + log($quality) * 450000)),
            ]);
        }
    }
}