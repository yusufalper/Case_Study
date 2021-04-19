<?php

namespace App\Console\Commands;

use App\Services\GetDataServices;
use Illuminate\Console\Command;

class GetDataFromApis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getdata {--addProvider=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Data From API.';

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
     * @return int
     */
    public function handle()
    {
        if ($this->option('addProvider')) {
            $response = GetDataServices::getNewProviderData($this->option('addProvider'));
        }else {
            $response = GetDataServices::getDefaultData();
        }
        $this->info($response);
    }
}
