<?php

namespace FormularioAplicacao\Providers;

use Illuminate\Support\ServiceProvider;

class CodeProjectRepositoryProvider extends ServiceProvider
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
    }
}
