<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $fillable = ['title','body'];

  public function comments(){//複数形なのは、articleに対いてcommentが複数つくから
    return $this->hasMany('App\Comment');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
   }

}
