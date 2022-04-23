<?php

use Illuminate\Database\Seeder;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexes')->truncate();
        DB::table('sexes')->insert([
                'sex' => '男'
            ]);
        DB::table('sexes')->insert([
                'sex' => '女'
            ]);
        DB::table('sexes')->insert([
                'sex' => 'その他'
            ]);
        
    }
}
