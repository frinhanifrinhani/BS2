<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Endereco::class, function (Faker $faker) {
    return [
        'cep' => $faker->randomNumber(8),
        'endereco' => $faker->streetName,
        'complemento' => $faker->randomLetter,
        'numero' => $faker->randomNumber(3),
        'bairro' => $faker->citySuffix,
        'cidade' => $faker->city,
        'estado' => $faker->regexify('^(AK|AL|AR|AZ|CA|CO|CT|DE|FL|GA|HI|IA)$')
    ];
});

