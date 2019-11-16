<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'bs2.clientes';

    protected $fillable = array(
        'nome',
        'data_nascimento',
        'sexo',
        'cep',
        'endereco',
        'complemento',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'created_at',
        'updated_at',
    );

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

}
