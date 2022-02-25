<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Paciente;
use App\Repositories\Contracts\PacienteRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;
use DB;

class EloquentPacienteRepository extends BaseEloquentRepository implements PacienteRepositoryInterface
{
    public function entity()
    {
        return Paciente::class;
    }
    
    public function upPaciente($id, $request){
		$this->entity->where('id', $id)
				->update($request);
	}

    public function getVacinado($id){
		$dos_tomadas = Paciente::join('paciente_vacinados as pv', 'pacientes.id', 'pv.paciente_id')
                ->join('vacinas as v', 'v.id', 'pv.vacina_id')
                ->select('pacientes.nome as nome', 'v.nome as vacina', 'v.dias as dias', 'v.dose as dose','pv.created_at as dt_vacina')
                ->where('pacientes.id', $id)
                ->get();
		return $dos_tomadas;
	}

    public function dosesPaciente($id){
		$qnt_doses = DB::table('paciente_vacinados')
                            ->where('paciente_id', $id)
                            ->select(DB::raw('count(paciente_id) as qnt_tomadas'))
                            ->first();
		return $qnt_doses;
	}

	public function vacinaPaciente($id){
		$vac_tomada = Paciente::join('paciente_vacinados as pv', 'pacientes.id', 'pv.paciente_id')
                            ->join('vacinas as v', 'v.id', 'pv.vacina_id')
                            ->select('pacientes.nome as nome', 'v.nome as vacina', 'v.dose as dose','pv.created_at as dt_vacina')
                            ->where('pacientes.id', $id)
                            ->first();
		return $vac_tomada;
	}
}