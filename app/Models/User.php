<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use App\Casts\UserRankEnumCast; 
use App\Enums\UserRank;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'rank',
    ];

    protected function nameSama(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->name.' 様';
            }
        );
    }
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'rank' => UserRank::class,
    ];
    

    protected static function booted()
    {
        static::deleting(function ($user) {
            // 削除する前に必要な処理などを記載する
            dump('deleting');

            return false;
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    
}
