<?php

namespace App\Repositories\Contracts;

interface PacienteRepositoryInterface
{
    // public function search();
    public function upPaciente($id, $request);

    public function getVacinado($id);

    public function dosesPaciente($id);

    public function vacinaPaciente($id);
}