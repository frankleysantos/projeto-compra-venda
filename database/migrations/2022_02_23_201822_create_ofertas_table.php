<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfertasTable extends Migration {

	public function up()
	{
		Schema::create('ofertas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->enum('status_oferta', ['aberto', 'negociando', 'encerrado'])->default('aberto');
			$table->text('descricao')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ofertas');
	}
}