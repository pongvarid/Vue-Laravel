<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->company,
        'product_code' => $faker->e164PhoneNumber,
        'product_type' => $faker->randomElement($array = array (
            '0601',
            '0602',
            '0603',
            '0604',
            '0605',
            '0606',
            '0607',
            '0608',
            '0609',
            '0610',
            '0611',
        )), //type=06
        'product_description' => $faker->text,
        'status_id' => '1',
    ];
});
