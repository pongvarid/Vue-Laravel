<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Supplier;
use App\User;

$factory->define(Supplier::class, function ($faker)  use ($factory) {
    return [
        'company_name' => $faker->company,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'suffix' => $faker->suffix,
        'birthday' => $faker->date($format = 'Y-m-d'),
        'favorite' => $faker->realText(rand(10,20)),
        'remark' => $faker->text,
        'position' => $faker->address,
        'department' => $faker->jobTitle,
        'email' => $faker->email,
        'phone' => $faker->tollFreePhoneNumber,
        'mobile' => $faker->tollFreePhoneNumber,
        'fax' => $faker->phoneNumber,
        'mailing_address' => $faker->address,
        'mailing_street' => $faker->streetName,
        'mailing_city' => $faker->city,
        'mailing_state' => $faker->state,
        'mailing_zipcode' => $faker->postcode,
        'mailing_country' => $faker->country,
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'salutation' => $faker->randomElement($array = array ('0301','0302','0303')), //type=03
    ];
});
