<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\post;

class comment extends Model
{
  public $guarded=[];

  public function Users(){
    return $this->belongsTo(User::class, "user_id");
  }
  public function posts(){
    return $this->belongsTo(post::class, "post_id");
  }
}
