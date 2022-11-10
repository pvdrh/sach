<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            'name' => 'Văn học',
            'slug' => 'van-hoc',
            'depth' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Kinh tế',
            'slug' => 'kinh-te',
            'depth' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Trinh thám',
            'slug' => 'trinh-tham',
            'depth' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Truyện tranh',
            'slug' => 'truyen-tranh',
            'depth' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Tiểu thuyết',
            'slug' => 'tieu-thuyet',
            'depth' => 1
        ]);
    }
}
