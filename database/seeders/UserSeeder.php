<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'first_name' => 'سارا',
                'last_name' => 'احمدی',
                'mobile_number' => '09334565566',
                'website_type_id' => 1,
                'familiarity_type_id' => 1,
                'email' => 'JohnDoe@yahoo.com',
                'is_admin' => 0,
                'password' => bcrypt('12345678'),
            ],
            [
                'first_name' => 'سعید',
                'last_name' => 'حسینی',
                'mobile_number' => '09334565566',
                'website_type_id' => 1,
                'familiarity_type_id' => 1,
                'email' => 'John@yahoo.com',
                'is_admin' => 1,
                'password' => bcrypt('12345678'),
            ],
        ]);
    }
}
