<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_info')->truncate();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('user_info')->insert([
                'user_id' => $i,
                'fullname' => 'Thành viên ' . $i,
                'address' => 'Hà Nội'
            ]);
        }
    }
}
