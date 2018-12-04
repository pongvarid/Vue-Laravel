<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert([
            [
                'name' => 'Veritrans',
                'img_company' => 'logo.png',
                'company_id' => '09',
                'business_type' => '',
                'establish' => 'null',
                'status_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);

    }
}
