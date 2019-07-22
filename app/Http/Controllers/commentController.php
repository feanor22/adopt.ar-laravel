<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\comment;
use App\post;


class commentController extends Controller
{
  public function create(Request $formulario) {
      $reglas = [
        "text" => "string|min:0|max:1000",
        "user"=>"required",
        "post"=>"required",
      ];

      $this->validate($formulario, $reglas);

      $comment = new comment();

      $comment->text = $formulario["text"];
      $comment->user_id = $formulario["user"];
      $comment->post_id=$formulario["post"];

      $comment->save();

      return back();
  }

}
