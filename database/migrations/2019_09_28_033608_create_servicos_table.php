<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('descricao');
            $table->bigInteger('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->bigInteger('c_equipamento')->unsigned(); 
            $table->foreign('c_equipamento')->references('id')->on('equipamentos')->onDelete('cascade');
            $table->dateTime('data_previsao')->nullable();
            $table->dateTime('data_atendimento')->nullable();
            $table->dateTime('data_entrega');
            $table->enum('estado', array('aberto', 'atendimento', 'fechado'));
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
        Schema::dropIfExists('servicos');
    }
}
