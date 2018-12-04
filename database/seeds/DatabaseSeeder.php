<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            MbsChoiceTableSeeder::class,
            MbsSettingTableSeeder::class,
            CompanyTableSeeder::class,
            BranchTableSeeder::class,
            UsersTableSeeder::class,
            //TestTableSeeder::class,
            //TestSeeder::class,

        ]);
    }
}
