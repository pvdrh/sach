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
                'name' => 'Nguyễn Quang Thành',
                'email' => 'tquangds@gmail.com',
                'phone' => '0342956209',
                'address' => 'Hoài Đức, Hà Nội',
                'role' => 0,
                'password' => bcrypt('12345678')
            ]);

    }
}
