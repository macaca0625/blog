<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $guarded = [];

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body){
        $this->comment()->create(compact('body'));
    }
}
