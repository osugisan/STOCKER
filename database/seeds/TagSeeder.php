<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
        [
            'name' => 'キッチン',
            'user_id' => 1,
        ],[
            'name' => 'リビング',
            'user_id' => 1,
        ],[
            'name' => 'お風呂',
            'user_id' => 1,
        ],[
            'name' => '洗濯',
            'user_id' => 2,
        ],[
            'name' => '宝',
            'user_id' => 2,
        ],[
            'name' => 'エッチなやつ',
            'user_id' => 2,
        ],[
            'name' => '筋トレ',
            'user_id' => 3,
        ],[
            'name' => 'ひみつ道具',
            'user_id' => 3,
        ]
        ]);
    }
}
