<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\chatMessages;

class chat extends Model
{
    $guarded=[];

    public function chatMessages(){
      return $this->hasMany(chatMessages::class, 'chat_id' )
    }
}
