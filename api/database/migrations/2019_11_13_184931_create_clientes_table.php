<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome','100');
            $table->date('data_nascimento');
            $table->string('sexo','2');
            $table->string('cep', '8')->nullable();
            $table->string('endereco','50')->nullable();
            $table->string('complemento','20')->nullable();
            $table->string('numero','8')->nullable();
            $table->string('cidade','10')->nullable();
            $table->string('estado','2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
