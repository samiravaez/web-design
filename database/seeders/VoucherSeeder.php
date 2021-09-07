<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vouchers')->insert([
            [
                'code' => 12345,
                'name' => 'کدتخفیف بهاری',
                'discount_value' => 20,
                'discount_type' => 1,
                'description' => 'تخفیف لوازم خانگی',
                'times_used' => 2,
            ],
            [
                'code' => 54321,
                'name' => 'کدتخفیف زمستانه',
                'discount_value' => 3000,
                'discount_type' => 0,
                'description' => 'تخفیف پوشاک',
                'times_used' => 4,
            ],
        ]);
    }
}
