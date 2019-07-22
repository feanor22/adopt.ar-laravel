<?php

use Faker\Generator as Faker;


$factory->define(App\Record::class, function (Faker $faker) {

  $usuarios=\App\User::all();
  return [
      'user_id'=>$usuarios->shuffle()->first()->id,
  ];
});
