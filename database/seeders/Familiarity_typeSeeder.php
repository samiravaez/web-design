<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Familiarity_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('familiarity_types')->insert([
            [
                'name' => 'شبکه های اجتماعی',
            ],
            [
                'name' => 'معرفی',
            ],
            [
                'name' => 'گوگل',
            ]
        ]);
    }
}
