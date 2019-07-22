@extends("layouts.plantilla")
@section("titulo")
  Register
@endsection

@section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="col-md-4 call-xs-12 form">
          <form class="register" action="/register" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <fieldset class="register">
              <div class="info">
                <p>
                  <input id="nombre" type="text" class="form-control" id="exampleFormControlInput1" name="name" value= "{{old('name')}}" placeholder="Nombre y apellido" >
                  <div class="is_invalid"></div>
                </p>
                <p>
                  <input id="email" type="email" class="form-control" id="exampleFormControlInput1" name="email" value="{{old('email')}}" placeholder="Ingrese su email aqui...">
                  <div class="is-invalid"></div>
                </p>
                <p>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="profileimg" value="">
                </p>
                <p>
                  <input id="fecha-nac" type="date" class="form-control" id="exampleFormControlInput1" name="fecha-nac" value= "{{old('fecha-nac')}}" placeholder="fecha de nac dd/mm/aaaa">

                </p>
                <p>
                  <input id="pass" type="password" class="form-control" id="exampleFormControlInput1" name="password" value=""placeholder="Contraseña">
                </p>
                <p>
                  <input id="confPass" type="password" class="form-control" id="exampleFormControlInput1" name="password_confirmation" value=""placeholder="confirmar Contraseña">
                </p>
              </div>
              <div class="pregunta_seguridad">
                <p>
                  <select style="" class="form-control" id="exampleFormControlSelect2" name="pregunta">
                      <option value="null"class="hidden" selected disabled>Elegi una pregunta</option>
                    @if(old('pregunta')==0)
                      <option value="0" checked>Nombre de tu primer mascota?</option>
                    @else
                      <option value="0" >Nombre de tu primer mascota?</option>
                    @endif
                    @if(old('pregunta')==1)
                      <option value="1" checked>Cual fue tu primer auto?</option>
                    @else
                      <option value="1">Cual fue tu primer auto?</option>
                    @endif
                    @if(old('pregunta')==2)
                      <option value="2" checked>Como se llamaba tu escuela primaria?</option>
                    @else
                      <option value="2">Como se llamaba tu escuela primaria?</option>
                    @endif
                  </select>
                <p>

                  <input class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="respuesta" value=""placeholder="">
                </p>
              </div>
              <p>
              <div class="radio">
                <label class="radio_inline"></label>
                @if (old("genero")=='M')
                  <input calss= "radio" type="radio" name="genero" value="M" checked>
                @else

                    <input calss= "radio" type="radio" name="genero" value="M">

                @endif
                <span>Masculino</span>
                @if (old("genero")=='F')

                    <input calss= "radio" type="radio" name="genero" value="F" checked>

                @else

                    <input calss= "radio" type="radio" name="genero" value="F">

                @endif
                <span>Femenino</span>

                @if (old("genero")=='O')

                    <input calss= "radio" type="radio" name="genero" value="O" checked>

                @else

                    <input calss= "radio" type="radio" name="genero" value="O">

                @endif
                <span>Otro</span>

              </div>
              </p>
              <p class="button">
                <button type="submit" class="btn btn-primary mb-2" name="button">Enviar</button>
              </p>
            </fieldset>
          </form>

        </div>
      @endsection
