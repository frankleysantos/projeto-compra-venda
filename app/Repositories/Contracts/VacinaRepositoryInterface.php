<?php

namespace App\Repositories\Contracts;

interface VacinaRepositoryInterface
{
    public function registraVacina($vac_nome ,$vac_pac);
}