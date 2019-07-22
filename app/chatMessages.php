<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\chat;

class chatMessages extends Model
{
  $guarded=[];

  public function users(){
    return $this->belongsTo(User::class, 'sender_username');
  }
  public function chats(){
    return $this->belongTo(chat::class, 'chat_id')
  }
}
