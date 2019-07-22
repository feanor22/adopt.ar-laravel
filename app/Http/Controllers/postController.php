<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\comment;

use App\post;

use Auth;

class postController extends Controller
{
  public function news(){
    $usuario=Auth::user()->id;
    $lasts=post::where('user_id','!=',$usuario)->orderby("updated_at", 'desc')->get();
    $comments=comment::orderby("created_at","desc")->get();
    $vac=compact("lasts", "usuario","comments");
    return view('news', $vac);
  }
  public function posted(Request $formulario) {
      $reglas = [
        "image" => "required|image",
        "text" => "string|min:0|max:1000",
        "user_id"=>"required",
      ];

      $this->validate($formulario, $reglas);

      $image = $formulario->file("image");
      $fileRoot = $image->store("public");
      $fileName = basename($fileRoot);

      $post = new post();

      $post->image =  $fileName;
      $post->text = $formulario["text"];
      $post->user_id = $formulario["user_id"];

      $post->save();

      return back();
  }
public function delete(Request $formulario) {
  $idPost = $formulario["idPost"];
  $eraseComments=comment::where('post_id','=',$idPost);

  $erasedPost = post::find($idPost);
  $eraseComments->delete();
  $erasedPost->delete();

  return back();
 }
}
