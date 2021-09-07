<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_voucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_voucher')->insert([
            [
                'user_id' => 1,
                'voucher_id' => 1,
            ],
            [
                'user_id' => 1,
                'voucher_id' => 2,
            ],
        ]);
    }
}
