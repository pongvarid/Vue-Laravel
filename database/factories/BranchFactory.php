<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Setting\Branch;

$factory->define(Branch::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'website' => $faker->url,
        'fax' => $faker->tollFreePhoneNumber,
        'description' => $faker->text,
        'timezone' => $faker->timezone,
        'currency' => $faker->unixTime($max = 'now'),
        'remark' => $faker->text,
        'phone' => $faker->tollFreePhoneNumber,
        'mobile' => $faker->tollFreePhoneNumber,
        'mailing_address' => $faker->address,
        'mailing_street' => $faker->streetName,
        'mailing_city' => $faker->city,
        'mailing_state' => $faker->state,
        'mailing_zipcode' => $faker->postcode,
        'mailing_country' => $faker->country,
        'status_id' => '1',
    ];
});
