<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Opportunity\Opportunity_Product;
use App\Model\Opportunity\Opportunity;
use App\Model\Product;

$factory->define(Opportunity_Product::class, function ($faker)  use ($factory) {
    return [
        'expected_volume' => $faker->numberBetween(0, 10),
        'frequency' => $faker->randomElement($array = array ('0701','0702')), //type=07
        'gross_revenue' => $faker->randomFloat(2,1, 999999),
        'net_profit' => $faker->randomFloat(2,1, 99999),
        'status_id' => '1',
        'product_id' => $factory->create(Product::class)->id,
        'opportunity_id' => $factory->create(Opportunity::class)->id,
    ];
});
