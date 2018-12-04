<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Opportunity\Opportunity;
use App\User;
use App\Model\Account\Account;


$factory->define(Opportunity::class, function ($faker)  use ($factory) {
    return [
        'opportunity_name' => $faker->realText(rand(10,20)),
        'status' => $faker->randomElement($array = array ('0401','0402','0403','0404')), //type=04
        'probability' => $faker->randomFloat(2, 1, 999999),
        'loss_reason' => $faker->numberBetween(1, 9999),
        'closs_date' => $faker->date($format = 'Y-m-d'),
        'product' => $faker->bs,
        'status_id' => '1',
        'users_id' => $factory->create(User::class)->id,
        'account_id' => $factory->create(Account::class)->id,

    ];
});
