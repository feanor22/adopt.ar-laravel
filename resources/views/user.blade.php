@extends("layouts.plantilla")

@section("content")

  <div class="col-md-8 col-xs-12 container">
    <div class="top">
      <div class="userName">

       <h1> {{ucwords(strtolower($user->name))}}</h1>
     </div>
     <div class="follow-div">
      <form class="follow" action="/follow/{{$user->id}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="" value="{{$user->id}}">
        <button type="submit" class="btn btn-outline-info">Seguir</button>
      </form>
      <form class="unfollow" action="/unfollow/{{$user->id}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="" value="{{$user->id}}">
        <button type="submit" class="btn btn-outline-info">Dejar de seguir</button>
      </form>
    </div>
  </div>
  <div class="profileImg">
      <img class= "img" src="/storage/{{$user->profileimg}}" alt="">
  </div>
  @if (Auth::user()->id==$user->id)
  <div class="NewPost">
    <form class="createPost" action="/createPost" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <label for="">Imagen</label>
      <p>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" value="foto del post">
      </p>
      <p>
          <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </p>
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      <button type="submit" name="button" class="btn btn-outline-info">Crear post</button>
    </form>
  </div>
  @endif
  <div class="PostList">
      <ul class="ulList">
            @foreach ($posts  as $post)
              <li class="postName">
                  <ul class="onePost">
                    <div class="userInfo">
                      @if (Auth::user()->id==$user->id)
                        <li class="delete">

                          <form class="" action="/deletePost" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="idPost" value="{{$post->id}}">
                            <button type="submit" name="button" class="btn btn-outline-danger">Eliminar Post</button>
                          </form>
                        </li>
                      @endif
                      <li class="profImage"><img src="/storage/{{$post->Users->profileimg}}" alt=""> </li>
                      <li><a href="/user/{{$user->id}}">{{ucwords(strtolower($user->name))}}</a></li>
                    </div>
                    <li class='textLink'>{{$post->text}}</li>
                    <li class='image'><img class="posI" src="/storage/WhatsApp Image 2019-03-24 at 12.48.32.jpeg" alt=""></a></li>
                    <li><p>{{$post->coment}}</p></li>
                    <li>
                      <form class="commentForm" action="/commentCreate" method="post">
                      {{ csrf_field() }}
                      <div class="newComment">
                          <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                          <input type="hidden" name="user" value="{{Auth::user()->id}}">
                          <input type="hidden" name="post" value="{{$post->id}}">
                          <button type="submit" name="button" class="btn btn-outline-info">Comentar</button>
                        </div>
                    </form>
                  </li>
                  <div class="divComment">
                    <ul class="ulComment">
                      @foreach ($comments as $comment)
                                @if ($post->id==$comment->post_id)
                                  <li><a class="commentA" href="/user/{{$comment->user_id}}"><p>{{$comment->text}}</p> </li>
                                @endif
                      @endforeach
                    </ul>
                </div>
                  </ul>
              </li>
            @endforeach
        </ul>
    </div>
    </li>

  </ul>
</div>

@endsection
