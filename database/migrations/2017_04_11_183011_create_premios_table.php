<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('qtde_insc');
            $table->integer('qtde_bolsas_integrais');
            $table->integer('qtde_bolsas_parciais');
            $table->integer('qtde_smartwatch');
            $table->integer('qtde_tablets');
            $table->integer('qtde_smartphone');
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
        Schema::dropIfExists('premios');
    }
}
