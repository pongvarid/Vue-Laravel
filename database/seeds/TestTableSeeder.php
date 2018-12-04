<?php

use Illuminate\Database\Seeder;

use Flynsarmy\CsvSeeder\CsvSeeder;

class TestTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
		$this->table = 'product';
		$this->filename = base_path().'/database/seeds/csvs/test.csv';
	}

	public function run()
	{
		// Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		DB::table($this->table)->truncate();

		parent::run();
	}
}
