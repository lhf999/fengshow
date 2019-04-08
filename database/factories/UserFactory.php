<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Library::class, function (Faker $faker) {
    /*$t_time=date('YmdHis',time());
    $dir = public_path().'/static/www/img/'.$t_time;
    if (!file_exists($dir)){
        mkdir($dir,0777,true);
        chmod($dir,0777);
    }*/
    return [
        'name' => $faker->title,
        //'thumb' => $faker->image($dir),
        'thumb' => $faker->imageUrl(),
        'describe' => $faker->paragraph,
        'content' => $faker->paragraph.$faker->paragraph,
        'type' => 2,
        'uid' => 1, // secret
        'status' => 1, // secret
        'created_byid' => 1, // secret
        'created_byname' => '子熙', // secret
        'created' => $faker->dateTime,
    ];
});
