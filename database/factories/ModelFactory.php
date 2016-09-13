<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->email,
        'rol'   => $faker->randomElement(['usuario','empleado']),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Filmador::class, function(Faker\Generator $faker){
    return[
        'nombre'=>$faker->name,
        'apellido'=>$faker->lastName,
        'celular'=>$faker->phoneNumber,
        'direccion'=>$faker->streetAddress
    ];
});

$factory->define(\App\Cliente::class, function(Faker\Generator $faker){
    return[
        'nombre'=>$faker->name,
        'apellido'=>$faker->lastName,
        'celular'=>$faker->phoneNumber,
        'direccion'=>$faker->streetAddress,
        'familia'=>$faker->lastName
    ];
});

$factory->define(\App\Compromiso::class, function(Faker\Generator $faker){
    return[
        'descripcion'=>$faker->sentence,
        'nombre'=>$faker->randomElement(['Matrimonio','Bautizo','Santiago','Promocion','Quinceaños','Graduacion'])
    ];
});