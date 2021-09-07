<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Website_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_types')->insert([
            [
                'name' => 'فروشگاه',
            ],
            [
                'name' => 'آموزشی',
            ],
            [
                'name' => 'خبری',
            ]
        ]);
    }
}
