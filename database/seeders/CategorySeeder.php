<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'املاک',
                'parent_id' => null,
                'description' => '',
            ],
            [
                'name' => 'سایر',
                'parent_id' => null,
                'description' => '',
            ],
            [
                'name' => 'وسایل نقلیه',
                'parent_id' => 1,
                'description' => '',
            ], [
                'name' => 'خدمات ',
                'parent_id' => 2,
                'description' => '',
            ], [
                'name' => 'میوه و سبزیجات',
                'parent_id' => 3,
                'description' => '',
            ]
        ]);

    }
}
