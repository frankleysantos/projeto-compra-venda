<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            [
                'nome' => 'Notebook',
                'categoria_produto_id' => '1',
            ],
            [
                'nome' => 'Mouse',
                'categoria_produto_id' => '1',
            ],
            [
                'nome' => 'Teclado',
                'categoria_produto_id' => '1',
            ],
            [
                'nome' => 'Monitor',
                'categoria_produto_id' => '1',
            ],
            [
                'nome' => 'Desktop',
                'categoria_produto_id' => '1',
            ],
            [
                'nome' => 'SSD/HD',
                'categoria_produto_id' => '1',
            ],
            [
                'nome' => 'Cadeira Escritório',
                'categoria_produto_id' => '3',
            ],
            [
                'nome' => 'Cadeira Gamer',
                'categoria_produto_id' => '3',
            ],
            [
                'nome' => 'Mesa Escritório',
                'categoria_produto_id' => '3',
            ],
        ];

        foreach ($produtos as $produto) {
            DB::table('produtos')->insert([
                'nome' => $produto['nome'],
                'categoria_produto_id' => $produto['categoria_produto_id'],
            ]);
        }
        return $produtos;
    }
}
