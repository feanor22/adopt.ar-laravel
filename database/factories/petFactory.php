<?php

use Faker\Generator as Faker;
$users=\App\User::all();

$factory->define(App\pet::class, function (Faker $faker) {
  $users=\App\User::all();
  $records=\App\Record::all();
    return [
        'name'=>$faker->word,
        'edad'=>$faker->numberBetween(0,15),
        'especie'=>$faker->word,
        'tamaño'=>$faker->text($maxNbChars = 7),
        'user_id'=>$users->shuffle()->first()->id,
        'Record_id'=>$records->shuffle()->first()->id,
    ];
});
