<?php

use Illuminate\Database\Seeder;

class MbsSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mbs_setting')->insert([
            [
                'name' => 'mulberrysoft',
                'value' => 'Veritrans',
                'description' => null,
                'other' => null,
                'permission' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'reset-password',
                'value' => '1',
                'description' => 'reset password',
                'other' => null,
                'permission' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'tittle',
                'value' => 'Veritrans',
                'description' => null,
                'other' => null,
                'permission' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'login_name',
                'value' => 'Login',
                'description' => 'ชื่อปุ่ม login',
                'other' => 'text',
                'permission' => 01,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'navbar',
                'value' => 'lblue',
                'description' => 'navabr และ theme',
                'other' => null,
                'permission' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'theme',
                'value' => 'lblue',
                'description' => 'theme',
                'other' => null,
                'permission' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'theme-drop',
                'value' => 'lblue',
                'description' => ' theme',
                'other' => null,
                'permission' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'theme-iris',
                'value' => 'lblue',
                'description' => ' theme',
                'other' => null,
                'permission' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'register_lock',
                'value' => '1',
                'description' => null,
                'other' => null,
                'permission' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'box-blue',
                'value' => 'lnav-deep',
                'description' => 'ตัวแปรเสริม',
                'other' => null,
                'permission' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'blue',
                'value' => 'box-blue',
                'description' => 'กำหนดค่าสี',
                'other' => null,
                'permission' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'bgBackground',
                'value' => 'box-transparent',
                'description' => 'แบล็กกราว',
                'other' => null,
                'permission' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'bg_login',
                'value' => 'box-transparent',
                'description' => 'แบล็กกราวหน้า login',
                'other' => 'css',
                'permission' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'navbar_collapse',
                'value' => 'lpop',
                'description' => null,
                'other' => null,
                'permission' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);

    }
}
