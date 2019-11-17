<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cliente_id');
            $table->string('cep', '8')->nullable();
            $table->string('endereco','80')->nullable();
            $table->string('complemento','80')->nullable();
            $table->string('numero','20')->nullable();
            $table->string('bairro','50')->nullable();
            $table->string('cidade','50')->nullable();
            $table->string('estado','2')->nullable();
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco');
    }
}
