<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $fillable = ["title", "content", "subtitle", "coverImg", "category_id"];
    protected $guarded = []; //se voglio tutti i campi

    public function user() {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany(('App\Tag'));
    }
}
