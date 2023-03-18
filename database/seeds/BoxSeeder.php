<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boxes')->insert([
        [
            'name' => 'くすり箱',
            'description' => '薬とか日用品の箱',
            'memo' => '',
            'user_id' => '1',
        ],[
            'name' => 'りんボックス',
            'description' => 'りんの箱',
            'memo' => '',
            'user_id' => '1',
        ],[
            'name' => '雑貨ボックス',
            'description' => '',
            'memo' => '',
            'user_id' => '1',
        ],[
            'name' => 'なんでもボックス',
            'description' => 'なんでも入ってる箱',
            'memo' => '',
            'user_id' => '2',
        ],[
            'name' => '四次元ボックス',
            'description' => '四次元な箱',
            'memo' => '',
            'user_id' => '2',
        ],[
            'name' => 'すごい箱',
            'description' => '何かとすごい箱',
            'memo' => '',
            'user_id' => '3',
        ],[
            'name' => '筋トレボックス',
            'description' => '筋トレ用品の箱',
            'memo' => '',
            'user_id' => '3',
        ],[
            'name' => 'ドラえもん',
            'description' => 'もはやドラえもん',
            'memo' => '',
            'user_id' => '2',
        ],[
            'name' => 'マッチョ箱',
            'description' => '',
            'memo' => '',
            'user_id' => '3',
        ]
        ]);
    }
}
