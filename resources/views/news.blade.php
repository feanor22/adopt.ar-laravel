@extends("layouts.plantilla")
@section("titulo")
  news
@endsection

@section("content")
  @php
    $fotos=["WhatsApp Image 2019-03-20 at 19.51.33.jpeg","WhatsApp Image 2019-03-23 at 13.37.41.jpeg","WhatsApp Image 2019-03-24 at 12.48.31.jpeg","WhatsApp Image 2019-03-24 at 12.48.32.jpeg"]
  @endphp

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <div class="col-md-8 col-xs-12 container">
    <div class="NewPost">
        <form class="creatPost " action="/createPost" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <p>
              <input  id="file_1" type="file" class="file" id="exampleFormControlFile1" name="image" value="{{old("image")}}">
          </p>
          <p>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </p>
          <input type="hidden" name="user" value="{{Auth::user()->id}}">
          <button type="submit" name="button" class="btn btn-outline-info">Crear post</button>
        </form>
      </div>
    <div class="newsList">
        <ul class="ulList">
          @foreach ($lasts as $last)
                <li class="postName">
                    <ul class="onePost">
                      <div class="userInfo">
                        @if (Auth::user()->id==$last->user_id)
                          <li class="delete">
                            <form class="" action="/deletePost" method="post">
                              {{ csrf_field() }}
                              <input type="hidden" name="idPost" value="{{$last->id}}">
                              <button type="submit" name="button" class="btn btn-outline-danger borrar">Eliminar Post</button>
                            </form>
                            </li>
                            <li class="profImage"><img src="/storage/{{$last->Users->profileimg}}" alt=""> </li>
                            <li class='nameLink'><a href="/user/{{$last->user_id}}">{{ucwords(strtolower($last->Users->name))}}</a></li>
                            </div>
                            <li class='textLink'>{{$last->text}}</li>
                            <li class='image'><img class="posI" src="storage/WhatsApp Image 2019-03-20 at 19.51.33.jpeg" alt=""></a></li>
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
                            <li>
                                <ul class="ulComment">
                                  @foreach ($comments as $comment)
                                    @if ($last->id==$comment->post_id)
                                      <li class="profImage"><img src="/storage/{{$comment->Users->profileimg}}" alt=""> </li>
                                      <li><a href="/user/{{$comment->user_id}}">{{$comment->Users->name}}</a></li>
                                      <li><p >{{$comment->text}}</p> </li>

                                    @endif

                                  @endforeach
                                </ul>
                              </li>
                          @else
                            <li class="profImage"><img src="{{$last->Users->profileimg}}" alt=""> </li>
                            <li class='nameLink'><a href="/user/{{$last->user_id}}">{{ucwords(strtolower($last->Users->name))}}</a></li>
                            </div>
                            <li class='textLink'>{{$last->text}}</li>
                            <li class='image'><img class="posI" src="storage/WhatsApp Image 2019-03-20 at 19.51.33.jpeg" alt=""></a></li>
                            <ul class="ulComment">
                              @foreach ($comments as $comment)
                                @if ($last->id==$comment->post_id)

                                  <li><p>{{$comment->text}}</p> </li>

                                @endif

                              @endforeach
                            </ul>
                        @endif


                    </ul>
                </li>
          @endforeach
          </ul>

    </div>
  </div>

@endsection
