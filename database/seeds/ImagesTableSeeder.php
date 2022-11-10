<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();
        for ($i = 1; $i < 6; $i++) {
            DB::table('images')->insert([
                'name' => 'images' . $i,
                'path' => '/public/backend/',
                'product_id' => 1
            ]);
        }

        for ($i = 6; $i < 11; $i++) {
            DB::table('images')->insert([
                'name' => 'images' . $i,
                'path' => '/public/backend/',
                'product_id' => 2
            ]);
        }
    }
}
