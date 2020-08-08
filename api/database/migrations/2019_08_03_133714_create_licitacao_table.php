<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicitacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor');
            $table->decimal('valor_realizado');
            $table->string('codigo')->nullable();
            $table->string('orgao_id');
            $table->string('empresa_id');
            $table->foreign('empresa_id')->references('_id')->on('empresa');
            $table->foreign('orgao_id')->references('_id')->on('orgao');
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
        Schema::dropIfExists('licitacao');
    }
}
