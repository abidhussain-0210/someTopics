<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:get_database_name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Get Current Database Name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataBase = DB::connection()->getDatabaseName();
        $this->info("Database Name Is $dataBase");
    }
}
