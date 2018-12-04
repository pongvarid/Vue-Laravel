<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Lead\Lead;
use App\Model\Lead\Call;
use App\User;
use App\Model\Account\Account;

$factory->define(Call::class, function ($faker)  use ($factory) {
    return [
        'subject' => $faker->realText(rand(10,20)),
        'comment' => $faker->text,
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'lead_id' => $factory->create(Lead::class)->id,
        'account_id' => $factory->create(Account::class)->id,
    ];
});

