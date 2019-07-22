<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\post;
use App\comment;

class userController extends Controller
{
    public function postByUser($id){
      $user = User::find($id);
      $posts = post::where("user_id", "=", $user->id)
      ->orderby('updated_at', 'descs')->get();
      $comments=comment::orderby("created_at","desc")->get();

      return view('user', compact('user', 'posts','comments'));
    }


   public function follow(int $id){
        $user = User::find($id);
        if(! $user) {
           return redirect()->back()->with('error', 'User does not exist.');
         }
       else{
          $user->followers()->attach(auth()->user()->id);
          return redirect()->back()->with('user/{{$user->id}}', 'Successfully followed the user.');
          }
}
public function unFollow(int $id){
      $user = User::find($id);
      if(! $user) {
         return redirect()->back()->with('error', 'User does not exist.');
     }
     else {
    $user->followers()->detach(auth()->user()->id);

    return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }
}
/*public function show(int $userId)
{
    $user = User::find($userId);
    $followers = $user->followers;
    $followings = $user->followings;

    return view('user.show', compact('user', 'followers' , 'followings');
}
*/
}
