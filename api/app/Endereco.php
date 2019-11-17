<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'bs2.endereco';

    protected $fillable = array(
        'cep',
        'endereco',
        'complemento',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cliente_id',
    );

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    function clientes()
    {
        return $this->hasOne(Cliente::class);
    }
}
