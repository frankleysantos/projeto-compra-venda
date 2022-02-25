<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFotosTable extends Migration {

	public function up()
	{
		Schema::create('fotos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('produto_id')->unsigned();
			$table->string('url')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('fotos');
	}
}