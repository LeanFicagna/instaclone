<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    public function post() {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function postLike() {
        return $this->hasMany(PostLike::class, 'user_id', 'id');
    }

    public function postComment() {
        return $this->hasMany(PostComment::class, 'user_id', 'id');
    }

    public function follow() {
        return $this->hasMany(Follow::class, 'user_id', 'id');
    }

}
