<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMensagensTable extends Migration {

	public function up()
	{
		Schema::create('mensagens', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('recebe_user_id')->unsigned()->nullable(); //quem vende
			$table->integer('envia_user_id')->unsigned(); //quem vende
			$table->integer('oferta_id')->unsigned();
			$table->decimal('valor_oferta', 10,2)->nullable();
			$table->text('descricao')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mensagens');
	}
}