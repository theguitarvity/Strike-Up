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
use App\Services\ConsultaEmpresaService;
use App\Services\ConsultaSociosService;
use GuzzleHttp\Client;
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
        $guzzleClient = new Client(['timeout' => 1200, 'read_timeout' => 1200]);

        $this->app->bind(ConsultaEmpresaService::class, function ($app) use ($guzzleClient) {
            return new ConsultaEmpresaService($guzzleClient);
        });

        $this->app->bind(ConsultaSociosService::class, function ($app) use ($guzzleClient) {
            return new ConsultaSociosService($guzzleClient);
        });


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
