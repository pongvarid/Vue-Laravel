<?php
// -----------------------NET---------------------------------

use Faker\Generator as Faker;
use App\Model\Setting\Branch;
use App\User;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function ($faker)  use ($factory) {
    return [
        'username' => $faker->username,
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'img_user' => $faker->imageUrl($width = 640, $height = 480),
        'password' =>  Hash::make('1234'),
        'phone' => $faker->tollFreePhoneNumber,
        'permission' => $faker->randomElement($array = array ('0901','0902')),
        'branch_id' => $factory->create(Branch::class)->id,
        'status_id' => '1',
    ];
});
