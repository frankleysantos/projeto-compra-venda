<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'Informática', 'Eletrônico', 'Casa'
        ];

        foreach ($categorias as $categoria) {
            DB::table('categoria_produtos')->insert([
                'nome' => $categoria,
            ]);
        }
        return $categorias;
    }
}
