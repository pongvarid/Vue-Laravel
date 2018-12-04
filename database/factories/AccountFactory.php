<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Account\Account;
use App\User;
use App\Model\Setting\Branch;

$factory->define(Account::class, function ($faker)  use ($factory) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'website' => $faker->url,
        'phone' => $faker->tollFreePhoneNumber,
        'mobile' => $faker->tollFreePhoneNumber,
        'fax' => $faker->phoneNumber,
        'employee' =>$faker->numberBetween(200, 9000),
        'billing_address' => $faker->address,
        'billing_street' => $faker->streetName,
        'billing_city' => $faker->city,
        'billing_state' => $faker->state,
        'billing_zipcode' => $faker->postcode,
        'billing_country' => $faker->country,
        'shipping_address' => $faker->address,
        'shipping_street' => $faker->streetName,
        'shipping_city' => $faker->city,
        'shipping_state' => $faker->state,
        'shipping_zipcode' => $faker->postcode,
        'shipping_country' => $faker->country,
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'industry_type' => $faker->randomElement($array = array ('0501','0502')), //type=05
    ];
});
