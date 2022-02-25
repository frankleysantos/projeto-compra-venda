<?php

namespace App\Providers;

use App\Repositories\Contracts\PacienteRepositoryInterface;
use App\Repositories\Contracts\VacinaRepositoryInterface;
use App\Repositories\Core\Eloquent\EloquentPacienteRepository;
use App\Repositories\Core\Eloquent\EloquentVacinaRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PacienteRepositoryInterface::class,
            EloquentPacienteRepository::class
        );

        $this->app->bind(
            VacinaRepositoryInterface::class,
            EloquentVacinaRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
