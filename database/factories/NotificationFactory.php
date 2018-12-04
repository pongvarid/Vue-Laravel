<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Account\Notification;
use App\User;
use App\Model\Contact\Contact;

$factory->define(Notification::class, function ($faker)  use ($factory) {
    return [
        'description' => $faker->text,
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'contact_id' => $factory->create(Contact::class)->id,
    ];
});
