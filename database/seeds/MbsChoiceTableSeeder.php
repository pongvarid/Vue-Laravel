<?php

use Illuminate\Database\Seeder;

class MbsChoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mbs_choice')->insert([
            [
                'name' => 'UserPermission',
                'type' => '09',
                'value' => null,
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Admin',
                'type' => '09',
                'value' => '0901',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'User',
                'type' => '09',
                'value' => '0902',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Event Type',
                'type' => '02',
                'value' => null,
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Customer Presentation',
                'type' => '02',
                'value' => "0201",
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Customer Visit',
                'type' => '02',
                'value' => '0202',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Conference',
                'type' => '02',
                'value' => '0203',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Other',
                'type' => '02',
                'value' => '0204',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Salutation',
                'type' => '03',
                'value' => null,
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mr.',
                'type' => '03',
                'value' => '0301',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mrs.',
                'type' => '03',
                'value' => '0302',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Miss.',
                'type' => '03',
                'value' => '0303',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Status',
                'type' => '04',
                'value' => null,
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Prospect',
                'type' => '04',
                'value' => '0401',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Quote',
                'type' => '04',
                'value' => '0402',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Win',
                'type' => '04',
                'value' => '0403',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Loss',
                'type' => '04',
                'value' => '0404',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Industry Type',
                'type' => '05',
                'value' => null,
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Agriculture',
                'type' => '05',
                'value' => '0501',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Banking',
                'type' => '05',
                'value' => '0502',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Product Type',
                'type' => '06',
                'value' => null,
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Air Import',
                'type' => '06',
                'value' => '0601',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Air Export',
                'type' => '06',
                'value' => '0602',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sea Import',
                'type' => '06',
                'value' => '0603',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sea Export',
                'type' => '06',
                'value' => '0604',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Customer Clearance',
                'type' => '06',
                'value' => '0605',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Insurance',
                'type' => '06',
                'value' => '0606',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cross Boarder',
                'type' => '06',
                'value' => '0607',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Domestic Truck',
                'type' => '06',
                'value' => '0608',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Packing',
                'type' => '06',
                'value' => '0609',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Warehouse',
                'type' => '06',
                'value' => '0610',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Other',
                'type' => '06',
                'value' => '0611',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],[
                'name' => 'Frequency',
                'type' => '07',
                'value' => null,
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'One time off',
                'type' => '07',
                'value' => '0701',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Regular.',
                'type' => '07',
                'value' => '0702',
                'other' => null,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);

    }
}
