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
            $table->bigIncrements('numero');
            $table->string('descricao');
            $table->integer('id_cliente')->unsigned();
            $table->integer('c_equipamento')->unsigned(); 
            $table->dateTime('data_abertura');
            $table->dateTime('data_previsao')->nullable();
            $table->dateTime('data_atendimento')->nullable();
            $table->dateTime('data_entrega');
            $table->enum('estado', array('aberto', 'atendimento', 'fechado'));
            $table->text('nota');
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
