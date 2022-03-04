<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('produtos', function(Blueprint $table) {
			$table->foreign('categoria_produto_id')->references('id')->on('categoria_produtos')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('oferta_produtos', function(Blueprint $table) {
			$table->foreign('oferta_id')->references('id')->on('ofertas')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('oferta_produtos', function(Blueprint $table) {
			$table->foreign('produto_id')->references('id')->on('produtos')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('fotos', function(Blueprint $table) {
			$table->foreign('produto_id')->references('id')->on('oferta_produtos')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('ofertas', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});

		Schema::table('mensagens', function(Blueprint $table) {
			$table->foreign('envia_user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});

		Schema::table('mensagens', function(Blueprint $table) {
			$table->foreign('recebe_user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});

		Schema::table('mensagens', function(Blueprint $table) {
			$table->foreign('oferta_id')->references('id')->on('ofertas')
						->onDelete('cascade')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('produtos', function(Blueprint $table) {
			$table->dropForeign('produtos_categoria_produto_id_foreign');
		});
		Schema::table('oferta_produtos', function(Blueprint $table) {
			$table->dropForeign('oferta_produtos_oferta_id_foreign');
		});
		Schema::table('oferta_produtos', function(Blueprint $table) {
			$table->dropForeign('oferta_produtos_produto_id_foreign');
		});
		Schema::table('fotos', function(Blueprint $table) {
			$table->dropForeign('fotos_produto_id_foreign');
		});
		Schema::table('ofertas', function(Blueprint $table) {
			$table->dropForeign('ofertas_user_id_foreign');
		});
		Schema::table('mensagens', function(Blueprint $table) {
			$table->dropForeign('mensagens_envia_user_id_foreign');
		});
		Schema::table('mensagens', function(Blueprint $table) {
			$table->dropForeign('mensagens_recebe_user_id_foreign');
		});
		Schema::table('mensagens', function(Blueprint $table) {
			$table->dropForeign('mensagens_oferta_id_foreign');
		});
	}
}