<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'root',
                'fullname' => 'root',
                'email' => 'root',
                'img_user' => 'https://lorempixel.com/640/480/?59970',
                'password' => bcrypt('root'),
                'phone' => '800-297-4592',
                'permission' => '0901',
                'branch_id' => 1,
                'status_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
