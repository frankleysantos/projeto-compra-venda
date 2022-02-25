<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriaProdutosTable extends Migration {

	public function up()
	{
		Schema::create('categoria_produtos', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categoria_produtos');
	}
}