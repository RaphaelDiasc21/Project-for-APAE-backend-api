<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contribuicao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuicoes', function (Blueprint $table) {
            $table->id();
            $table->string("valor");
            $table->string("nome");
            $table->string("email");
            $table->string("cpf");
            $table->string("aniversario");
            $table->string("telefone");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
