<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Lead\Lead;
use App\User;


$factory->define(Lead::class, function ($faker)  use ($factory) {
    return [
        'lead_status' => $faker->randomElement($array = array ('Working','New','ติดตามแล้ว')),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'suffix' => $faker->suffix,
        'title' => $faker->realText(rand(10,20)),
        'email' => $faker->email,
        'phone' => $faker->tollFreePhoneNumber,
        'mobile' => $faker->tollFreePhoneNumber,
        'rating' => $faker->numberBetween(1, 999),
        'website' => $faker->url,
        'company' => $faker->company,
        'industry' => $faker->companySuffix,
        'employees' => $faker->numberBetween(1000, 9000),
        'street' => $faker->streetName,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode,
        'country' => $faker->country,
        'status_id' => '1',
        'salutation' => $faker->randomElement($array = array ('0301','0302','0303')), //
        'users_id' => $factory->create(User::class)->id,
    ];
});
