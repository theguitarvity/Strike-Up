<?php

namespace App\Console\Commands;

use App\Services\ImportarDadosNoSistemaService;
use Illuminate\Console\Command;

class InicializarBanco extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inicializar:banco';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inicializa o banco de dados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->output->write("<info>Inicializando o banco.</info>");
        $service = app()->make(ImportarDadosNoSistemaService::class);
        $service->execute();
        $this->output->write("<info>Banco iniciado.</info>");
    }
}
