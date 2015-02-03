<?php
use Illuminate\Database\Seeder;
use MovBizz\Statistics\Statistic;

class StatisticsTableSeeder extends Seeder{

    public function run()
    {
        Statistic::create(['name' => 'numberOfGames', 'value' => 0]);
        Statistic::create(['name' => 'numberOfProducedMovies', 'value' => 0]);
        Statistic::create(['name' => 'numberOfDrugsUsed', 'value' => 0]);
        Statistic::create(['name' => 'lotteryWinnings', 'value' => 0]);
    }
}