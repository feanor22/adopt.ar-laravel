@extends("layouts.plantilla")
@section('titulo')
  Casos
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
    <form class="creatPost" action="/Record" method="post">
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

  <div class="newsList">
      <ul class"ulList">
            @foreach ($Records as $Record)
              <li class="postName">
                  <ul class="onePost">
                    <div class="userInfo">
                      <li class="profImage"><img src="{{$Record->Users->profileimg}}" alt=""> </li>
                      <li class="nameLink"><a href="/Record/{{$Record->user_id}}">{{$Record->Users->name}}</a></li>
                    </div>
                    <li class="image"><a class= "imagenes" href="/Record/{{$Record->}}"><img class="posI" src="storage/WhatsApp Image 2019-03-24 at 12.48.31.jpeg" alt=""></li>
                    <li><p>{{$Record->coment}}</p> </li>
                    @if (Auth::User()->id = $Record->user_id)
                    <li>
                      <form class="" action="/deletePost" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="idPost" value="{{$Record->id}}">
                        <button type="submit" name="button" class="btn btn-danger">Eliminar Post</button>
                      </form>
                    </li>
                  @endif
                  </ul>
              </li>
            @endforeach
        </ul>
  </div>
</div>
@endsection
