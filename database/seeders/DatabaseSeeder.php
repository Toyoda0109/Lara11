<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ログイン用のユーザーを作成
        $me = User::create([
            'name' => 'KODAI',
            'email' => 'toyoda@foo.bar',
            'password' => Hash::make('hogehoge'),
        ]);

        // 自分の投稿を作成
        Post::factory(5)->create([
            'user_id' => $me->id, 
        ]);

        // 他のユーザーを作成（5人）
        $users = User::factory(5)->create(); 

        // 各ユーザーに投稿を2〜5件作成
        foreach ($users as $user) {
            Post::factory(random_int(2, 5))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
