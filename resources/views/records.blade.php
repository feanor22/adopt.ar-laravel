@extends("layouts.plantilla")
@section('titulo')
  Casos
@endsection

@section("content")
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
      {{csrf_field()}}
    <label for="">Imagen</label>
      <p>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" value="foto del post">
      </p>
      <p>
        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>      </p>
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      <button type="submit" name="button" class="btn btn-outline-info">Crear post</button>
    </form>
  </div>

  <div class="newsList">
      <ul class="onePost">
            @foreach ($Records as $Record)
              <li class="postName">
                  <ul class="onePost">
                    <div class="userInfo">
                      <li class="profImage"><img src="{{$Record->Users->profileimg}}" alt=""> </li>
                      <li class='nameLink'><a href="/user/{{$Record->user_id}}">{{$Record->Users->name}}</a></li>
                    </div>
                    <li class="image"><a class="imagenes" href="/Record/{{$Record->id}}"><img class"posI" src="storage/WhatsApp Image 2019-03-23 at 13.37.41.jpeg" alt=""> </a> </li>
                    <li><p>{{$Record->coment}}</p> </li>
                  </ul>
              </li>
            @endforeach
        </ul>
  </div>
</div>
@endsection
