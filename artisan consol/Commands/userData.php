<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class userData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_user_data {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get User Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {   
        if($this->argument('id')){
            $user = User::whereId($this->argument('id'))->get(['id' , 'name' , 'email']);
        if ($user->isEmpty()) {
            $this->info('No users found.');
        }

        $headers = ['Id', 'Name', 'Email'];
        $this->table($headers, $user);
        }
        else{
            
            $user = User::get(['id' , 'name' , 'email']);
        if ($user->isEmpty()) {
            $this->info('No users found.');
        }

        $headers = ['Id', 'Name', 'Email'];
        $this->table($headers, $user);
        }
            
    }
}
