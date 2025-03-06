<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function uniqueIds()
    {
        return ['uuid']; 
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
