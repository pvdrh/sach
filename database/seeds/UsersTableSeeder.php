<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '0342956205',
                'address' => 'Hà Nội',
                'is_protected' => 1,
                'role' => 0,
                'password' => bcrypt('123456')
            ]);

    }
}
