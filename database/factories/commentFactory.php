<?php

use Faker\Generator as Faker;

$factory->define(App\comment::class, function (Faker $faker) {
  $posts=\App\post::all();
  return [
      'post_id'=>$posts->shuffle()->first()->id,
      'text'=>$faker->text($maxNbChars = 200),
  ];
});
