<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanhas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->string('cep',10);
            $table->string('cidade',100);
            $table->string('uf',2);
            $table->string('ibge',7);
            $table->date('dataInicioCampanha')->nullable();
            $table->date('dataTerminoCampanha')->nullable();




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
        Schema::dropIfExists('campanhas');
    }
}
