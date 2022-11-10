<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->truncate();
        for ($i = 1; $i < 11; $i++) {
            DB::table('authors')->insert([
                'name' => 'Tác giả ' . $i,
                'slug' => 'tac-gia-' . $i,
                'products_count' => 10
            ]);
        }
    }
}
