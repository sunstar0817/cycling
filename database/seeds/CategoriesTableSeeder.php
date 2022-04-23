<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                'category' => 'サイクリング'
            ]);
        DB::table('categories')->insert([
                'category' => '商品紹介'
            ]);
        DB::table('categories')->insert([
                'category' => 'スポット紹介'
            ]);
        DB::table('categories')->insert([
                'category' => 'その他'
            ]);
    }
}
