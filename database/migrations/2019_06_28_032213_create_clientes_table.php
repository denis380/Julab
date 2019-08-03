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
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('id_fornecedor')->unsigned();
            $table->foreign('id_fornecedor')->references('id')->on('users')->onDelete('cascade');
            $table->string('nome');
            $table->string('documento');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('estado');
            $table->string('rua');
            $table->string('numero');
            $table->string('email');
            $table->string('telefone');
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
