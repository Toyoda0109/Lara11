<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Model::shouldBeStrict(!$this->app->environment('production'));
 
        Gate::define('only-admin', function(User $user) {
            return $user->email === 'toyoda@foo.bar';
        });

        Gate::define('update', function(User $user, Post $post) {
            dump([
                'ログインユーザーID' => $user->id,
                '投稿の所有者ID' => $post->user_id,
                '認可結果' => $user->id === $post->user_id ? '許可' : '拒否'
            ]);
            return $user->id === $post->user_id;
        });
    }

}
