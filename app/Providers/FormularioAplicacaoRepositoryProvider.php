<?php

namespace FormularioAplicacao\Providers;

use Illuminate\Support\ServiceProvider;

class FormularioAplicacaoRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 
        $this->app->bind(
            \FormularioAplicacao\Repositories\ClientRepository::class,
            \FormularioAplicacao\Repositories\ClientRepositoryEloquent::class
        ); 
        $this->app->bind(
            \FormularioAplicacao\Repositories\ProjectRepository::class,
            \FormularioAplicacao\Repositories\ProjectRepositoryEloquent::class
        );

        $this->app->bind(
            \FormularioAplicacao\Repositories\ProjectNotesRepository::class,
            \FormularioAplicacao\Repositories\ProjectNotesRepositoryEloquent::class
        );
    }
}
