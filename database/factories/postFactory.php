<?php

use Faker\Generator as Faker;

$factory->define(App\post::class, function (Faker $faker) {
  $users=\App\User::all();
  $pets=\App\pet::all();
  $records=\App\Record::all();
    return [
      'image'=>$faker->imageUrl($width = 640, $height = 480),
      'text'=>$faker->text($maxNbChars = 255),
      'coment'=>$faker->text($maxNbChars = 100),
      'user_id'=>$users->shuffle()->first()->id,
      'Record_id'=>$records->shuffle()->first()->id,
    ];
});
