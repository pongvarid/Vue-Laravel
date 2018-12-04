<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Opportunity\Task;
use App\Model\Contact\Contact;
use App\Model\Opportunity\Opportunity;
use App\User;


$factory->define(Task::class, function ($faker)  use ($factory) {
    return [
        'subject' => $faker->realText(rand(10,20)),
        'due_date' => $faker->date($format = 'Y-m-d'),
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'contact_id' => $factory->create(Contact::class)->id,
        'opportunity_id' => $factory->create(Opportunity::class)->id,
    ];
});
