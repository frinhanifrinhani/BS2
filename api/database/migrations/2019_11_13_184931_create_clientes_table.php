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
            $table->string('nome','80');
            $table->date('data_nascimento');
            $table->enum('sexo',['M','F']);
            $table->string('cep', '8')->nullable();
            $table->string('endereco','80')->nullable();
            $table->string('complemento','80')->nullable();
            $table->string('numero','20')->nullable();
	        $table->string('bairro','50')->nullable();
            $table->string('cidade','50')->nullable();
            $table->string('estado','2')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
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
