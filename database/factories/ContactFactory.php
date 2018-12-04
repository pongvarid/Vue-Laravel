<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Contact\Contact;
use App\Model\Account\Account;
use App\User;

$factory->define(Contact::class,  function ($faker)  use ($factory) {
    return [
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
        'salutation' => $faker->randomElement($array = array ('0301','0302','0303')), //type=03
        'users_id' => $factory->create(User::class)->id,
        'account_id' => $factory->create(Account::class)->id,
    ];
});
