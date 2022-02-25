<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('raca_id');
            $table->unsignedInteger('cliente_id');
            $table->string('nome', 255);
            $table->timestamps();
            
            $table->foreign('cliente_id', 'pets_cliente_id_foreign')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('raca_id', 'pets_raca_id_foreign')->references('id')->on('racas')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
