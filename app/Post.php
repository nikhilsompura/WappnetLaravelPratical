<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var mixed
     */

    public function user()
     {
         return $this->belongsTo('App\User');
     }

     public function categories()
     {
         return $this->belongsToMany('App\Category')->withTimestamps();
     }

     public function tags()
     {
         return $this->belongsToMany('App\Tag')->withTimestamps();
     }

     public function favourite_to_users()
     {
         return $this->belongsToMany('App\User')->withTimestamps();
     }
}
