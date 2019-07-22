<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\post;
use App\comment;
use App\Record;
use App\chat;
use App\chatMessages;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','fecha-nac','pregunta','respuesta','genero','profileimg'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts(){
      return $this->hasMany(post::class, 'user_id');
    }
    public function comments(){
      return $this->hasMany(comment::class, "user_id");
    }
    public function chatssend(){
      return $this->belongsToMany(User::class, 'chat', 'user1', 'user2')->withTimestamps();
    }
    public function chatsrecive(){
        return $this->belongsToMany(User::class, 'chat', 'user2', 'user1')->withTimestamps();
    }

    //public function users(){
    //  return this->belongsToMany(User::class, 'friends', "user_id",'id_user');
    //}

    public function followers(){
      return $this->belongsToMany(User::class, 'friends', 'follower_id', 'followed_id')->withTimestamps();
    }

    public function followings(){
        return $this->belongsToMany(User::class, 'friends', 'followed_id', 'follower_id')->withTimestamps();
    }

}
