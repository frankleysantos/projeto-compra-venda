<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfertaProdutosTable extends Migration {

	public function up()
	{
		Schema::create('oferta_produtos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('produto_id')->unsigned();
			$table->integer('oferta_id')->unsigned();
			$table->boolean('aceita_oferta')->default(false);
			$table->decimal('valor', 10,2)->nullable();
			$table->text('descricao')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('oferta_produtos');
	}
}