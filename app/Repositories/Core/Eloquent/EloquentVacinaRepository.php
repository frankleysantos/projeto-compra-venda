<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Vacina;
use App\Repositories\Contracts\VacinaRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;
use DB;

class EloquentVacinaRepository extends BaseEloquentRepository implements VacinaRepositoryInterface
{
    public function entity()
    {
        return Vacina::class;
    }

    public function registraVacina($vac_nome ,$vac_pac)
	{
		$vacina = [
            'nome'          => $vac_pac['paciente'],
            'dt_vacina'     => Date('Y-m-d'),
            'vacina'        => $vac_nome,
            'vacina_id'     => $vac_pac['vacina_id']
        ];

        DB::table('paciente_vacinados')->insert([
            'vacina_id' => $vac_pac['vacina_id'],
            'paciente_id' => $vac_pac['paciente_id'],
            'created_at' => Date('Y-m-d')
        ]);

		return $vacina;
	}
}