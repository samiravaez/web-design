<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_voucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_voucher')->insert([
            [
                'product_id' => 1,
                'voucher_id' => 1,
            ],
            [
                'product_id' => 1,
                'voucher_id' => 2,
            ],
        ]);
    }
}
