<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Account\Task;
use App\Model\Contact\Contact;
use App\Model\Account\Account;
use App\User;


$factory->define(Task::class, function ($faker)  use ($factory) {
    return [
        'subject' => $faker->realText(rand(10,20)),
        'due_date' => $faker->date($format = 'Y-m-d'),
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'contact_id' => $factory->create(Contact::class)->id,
        'account_id' => $factory->create(Account::class)->id,
    ];
});
