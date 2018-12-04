<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Contact\Call;
use App\User;
use App\Model\Contact\Contact;
use App\Model\Account\Account;

$factory->define(Call::class, function ($faker)  use ($factory) {
    return [
        'subject' => $faker->realText(rand(10,20)),
        'comment' => $faker->text,
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'contact_id' => $factory->create(Contact::class)->id,
        'account_id' => $factory->create(Account::class)->id,
    ];
});

