<?php

namespace App\Console\Commands;

use App\Models\Actividade;
use App\Models\Noticia;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Log;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test description';

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
        $actividades = Actividade::where('fechaDeVigencia','<',date('Y-m-d'))->whereNull('deleted_at')->where('idTipoActividad','!=',5)->get();
        $noticias = Noticia::where('fechaDeValides','<',date('Y-m-d'))->whereNull('deleted_at')->get();
        Log::info('Numero de actividades encontradas: '.$actividades->count() . ' el dia ' . date('Y-m-d').'Noticias Encontradas a ser Eliminadas'.$noticias->count());
        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
