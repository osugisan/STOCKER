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
            'name' => 'おすぎ',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('testtest'),
        ]);
    }
}
