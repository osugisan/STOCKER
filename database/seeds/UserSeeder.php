<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'id' => '1',
            'name' => 'おすぎ',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('testtest'),
        ]);
        factory(User::class)->create([
            'id' => '2',
            'name' => 'ほげ山',
            'email' => 'hoge@hoge.com',
            'email_verified_at' => now(),
            'password' => Hash::make('hogehoge'),
        ]);
        factory(User::class)->create([
            'id' => '3',
            'name' => 'モリ山',
            'email' => 'mori@mori.com',
            'email_verified_at' => now(),
            'password' => Hash::make('morimori'),
        ]);
    }
}
