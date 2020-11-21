<?php

namespace App\Console\Commands;

use App\Mail\SellersUpdate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SellersUpdateCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sellers:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send sellers email to update their product in the website';

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
        Mail::send(new SellersUpdate());
        
        echo "Email sent";
    }
}
