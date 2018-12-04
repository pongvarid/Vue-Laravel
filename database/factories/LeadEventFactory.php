<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Lead\Event;
use App\Model\Lead\Lead;
use App\Model\Account\Account;
use App\User;

$factory->define(Event::class, function ($faker)  use ($factory) {
    return [
        'subject' => $faker->realText(rand(10,20)),
        'description' => $faker->text,
        'start' => $faker->date($format = 'Y-m-d'),
        'end' => $faker->date($format = 'Y-m-d'),
        'location' => $faker->address,
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'lead_id' => $factory->create(Lead::class)->id,
        'account_id' => $factory->create(Account::class)->id,
        'event_type' => $faker->randomElement($array = array ('0201','0202','0203','0204')), //type=02
    ];
});
