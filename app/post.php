<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\comment;

class post extends Model
{
    public $guarded=[];

    public function Users(){
      return $this->belongsTo(User::class, "user_id");
    }
    public function comments(){
      return $this->hasMany(comment::class, "post_id");
    }
}
