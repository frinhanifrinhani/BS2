<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

/*$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});*/

$factory->define(App\Cliente::class, function (Faker $faker)
{
    return [
        'nome' => $faker->name,
        'data_nascimento' => $faker->date,
        'sexo' => $faker->regexify('[M*F]'),
    ];

});
