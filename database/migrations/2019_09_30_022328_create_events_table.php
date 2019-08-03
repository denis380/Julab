<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_fornecedor')->unsigned();
            $table->foreign('id_fornecedor')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_servico')->unsigned();
            $table->foreign('id_servico')->references('id')->on('servicos')->onDelete('cascade');
            $table->string('title');
            $table->string('color');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('events');
    }
}
