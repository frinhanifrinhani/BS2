<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'bs2.cliente';

    protected $fillable = array(
        'nome',
        'data_nascimento',
        'sexo',
        'created_at',
        'updated_at',
    );

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    function enderecos()
    {
        return $this->hasOne(Endereco::class);
    }
}
