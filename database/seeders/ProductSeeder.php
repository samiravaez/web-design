<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'فروشگاه',
                'cat_id' => null,
                'price' => 20000,
                'discount_value' => 20,
                'discount_type' => 1
            ],
            [
                'name' => 'درگاه واسط',
                'cat_id' => 1,
                'price' => 30000,
                'discount_value' => 2000,
                'discount_type' => 0
            ], [
                'name' => 'سایت خبری',
                'cat_id' => 2,
                'price' => 40000,
                'discount_value' => 50,
                'discount_type' => 1
            ], [
                'name' => 'سایت آگهی',
                'cat_id' => 3,
                'price' => 10000,
                'discount_value' => 30000,
                'discount_type' => 0
            ]
        ]);

    }
}
