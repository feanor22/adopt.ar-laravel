<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Acme|Cairo|Catamaran" rel="stylesheet">
  <meta name="viewport" content="width=device-width-initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  


  </script>
  <meta charset="utf-8">
	<title>
		@yield("titulo")
	</title>
</head>
<div class="container-fluid">
  	<header class="row">
       <div class="col-xs-3 col-md-6 logo">
          <a href="/home"><p> Adopt.ar</p></a>
        </div>
        <nav class="nav nav-pills flex-column flex-sm-row">
            @if (Auth::check())
        				<p class="flex-sm-fill text-sm-center nav-link" >
        					Hola {{ucwords(strtolower(Auth::user()->name))}}
        				</p>

                <a class="flex-sm-fill text-sm-center nav-link " href="/user/{{Auth::user()->id}}">Mi cuenta</a>
        				<form method="POST" action="/logout">
        					{{csrf_field()}}
        					<button class="flex-sm-fill text-sm-center btn btn-outline-info" type="submit">Logout</button>
        				</form>

        				@else
                    <a calss="liNav" href="/login">Login</a>
                    <a calss="liNav" href="/register">Registrate</a>
        				@endif

        </nav>

  	</header>
    </div>
  <body>
    </div>
  	<section class="call-md-12 call-xs-12 container">
  		@yield("content")
  	</section>
  </body>
<script type="text/javascript" class="/model.js"></script>
</html>
