<?php

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branch')->insert([
            [
                'name' => 'Prof. Lucie Tillman MD',
                'website' => 'https://www.moen.net/dolore-nostrum-nulla-minima',
                'fax' => '877.989.7742',
                'description' => 'Beatae tempora voluptatibus nihil aliquid. Mollitia quos laboriosam doloremque repellat. Occaecati repellendus sunt sit necessitatibus consequuntur.',
                'timezone' => 'US/Arizona',
                'currency' => 'USD',
                'remark' => 'Eum et rem repudiandae labore eligendi consectetur debitis. Iste beatae rerum quis a et. Cumque numquam et ad ut.',
                'phone' => '1-877-856-3072',
                'mobile' => '888.687.4918',
                'mailing_address' => '3399 Senger Harbor Suite 475 West Gladyceside, NE 16133',
                'mailing_street' => 'Brakus Valley',
                'mailing_city' => 'Julianaview',
                'mailing_state' => 'Wisconsin',
                'mailing_zipcode' => '02903',
                'mailing_country' => 'Djibouti',
                'status_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
