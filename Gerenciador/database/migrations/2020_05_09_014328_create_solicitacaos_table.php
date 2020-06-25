<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('prioridade');
            $table->string('solicitante');
            $table->string('email_solicitante');

            $table->unsignedBigInteger('fila_id')->nullable();
            $table->foreign('fila_id')->references('id')->on('filas');

            $table->unsignedBigInteger('solicitacao_status_id');
            $table->foreign('solicitacao_status_id')->references('id')->on('solicitacao_status');
            
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
        Schema::dropIfExists('solicitacoes');
    }
}
