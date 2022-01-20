<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "content", "subtitle", "coverImg", "category"];

    public function user() {
        return $this->belongsTo('App\User', 'author_id');
    }
}
