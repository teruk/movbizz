<?php

class DatabaseSeeder extends Seeder {

	protected $tables = [
        'actors',
        'directors', 
        'locations',
        'statistics'
    ];

    protected $seeders = [
        'ActorsTableSeeder', 
        'DirectorsTableSeeder', 
        'LocationsTableSeeder',
        'StatisticsTableSeeder'
    ];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->cleanDatabase();

        foreach ($this->seeders as $seedClass)
        {
            $this->call($seedClass);
        }
	}

	/**
     * clean up the database
     */
    private function cleanDatabase()
    {
        // sets foreign key checks to zero
        // TODO: needs to removed before going live
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
