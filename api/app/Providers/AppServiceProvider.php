<?php

namespace App\Providers;

use App\Entities\Empresa;
use App\Entities\Licitacao;
use App\Entities\Orgao;
use App\Repositories\Contracts\EmpresaInterfaceRepository;
use App\Repositories\Contracts\LicitacaoInterfaceRepository;
use App\Repositories\Contracts\OrgaoInterfaceRepository;
use App\Repositories\EmpresaRepository;
use App\Repositories\LicitacaoRepository;
use App\Repositories\OrgaoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EmpresaInterfaceRepository::class, function($app)
        {
            return new EmpresaRepository(Empresa::class);
        });

        $this->app->bind(LicitacaoInterfaceRepository::class, function($app)
        {
            return new LicitacaoRepository(Licitacao::class);
        });

        $this->app->bind(OrgaoInterfaceRepository::class, function($app)
        {
            return new OrgaoRepository(Orgao::class);
        });
    }
}
