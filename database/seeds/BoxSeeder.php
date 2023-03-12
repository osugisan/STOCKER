<?php

use App\Models\Box;
use Illuminate\Database\Seeder;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Box::class)->create([
            'id' => '1',
            'name' => 'くすり箱',
            'description' => '薬とか日用品の箱',
            'memo' => '',
            'user_id' => '1',
        ]);
        factory(Box::class)->create([
            'id' => '2',
            'name' => 'りんボックス',
            'description' => 'りんの箱',
            'memo' => '',
            'user_id' => '1',
        ]);
        factory(Box::class)->create([
            'id' => '3',
            'name' => '雑貨ボックス',
            'description' => '',
            'memo' => '',
            'user_id' => '1',
        ]);
        factory(Box::class)->create([
            'id' => '4',
            'name' => 'なんでもボックス',
            'description' => 'なんでも入ってる箱',
            'memo' => '',
            'user_id' => '2',
        ]);
        factory(Box::class)->create([
            'id' => '5',
            'name' => '四次元ボックス',
            'description' => '四次元な箱',
            'memo' => '',
            'user_id' => '2',
        ]);
        factory(Box::class)->create([
            'id' => '6',
            'name' => 'すごい箱',
            'description' => '何かとすごい箱',
            'memo' => '',
            'user_id' => '3',
        ]);
        factory(Box::class)->create([
            'id' => '7',
            'name' => '筋トレボックス',
            'description' => '筋トレ用品の箱',
            'memo' => '',
            'user_id' => '3',
        ]);
        factory(Box::class)->create([
            'id' => '8',
            'name' => 'ドラえもん',
            'description' => 'もはやドラえもん',
            'memo' => '',
            'user_id' => '2',
        ]);
        factory(Box::class)->create([
            'id' => '9',
            'name' => 'マッチョ箱',
            'description' => '',
            'memo' => '',
            'user_id' => '3',
        ]);
    }
}
