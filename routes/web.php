<?php

/*



- Agregar la posibilidad de "seguir usuarios". Luego en la página principal o en "tu feed" debe verse un listado de los posts de los usuarios que uno sigue

Otras funcionalidades optativas:

- Agregar mensajeria privada entre usuarios
- Agregar la posibilidad de tener amistades (reciprocas)

Por supuesto que las funcionalidades que quieran agregar en fun'ción a sus proyetos serán valoradas
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/deletePost', 'postController@delete')->middleware("auth");//hecho modificar html para que eliminar este dentro de ul

Route::get('/user/{id}', 'userController@postByUser')->middleware("auth");//hecho

Route::post('/createPost', 'postController@posted')->middleware("auth");// falta agregar html

Route::get('/home', 'postController@news');//hecho/ agregar create post

Route::get('/chat', 'userController@chat');

Route::post('/follow/{Id}', 'userController@follow')->middleware("auth");

Route::post('/unfollow/{Id}', 'userController@unFollow')->middleware("auth");

Route::post('/commentCreate', 'commentController@create')->middleware("auth");
