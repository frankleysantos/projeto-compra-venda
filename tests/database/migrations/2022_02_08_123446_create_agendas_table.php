<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pet_id');
            $table->unsignedInteger('servico_id');
            $table->date('data');
            $table->time('hora');
            $table->text('observacao');
            $table->timestamps();
            
            $table->foreign('pet_id', 'agendas_pet_id_foreign')->references('id')->on('pets')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('servico_id', 'agendas_servico_id_foreign')->references('id')->on('servicos')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
