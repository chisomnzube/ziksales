<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\ProductUpload',
        'App\Console\Commands\ProductUpdate',
        'App\Console\Commands\WeeklyProductCmd',
        'App\Console\Commands\SellersUpdateCmd',
        'App\Console\Commands\RatingCmd',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('product:upload')->everyMinute();
        $schedule->command('product:update')->everyMinute();
        $schedule->command('weekly:product')->everyMinute();
        $schedule->command('sellers:update')->everyMinute();
        $schedule->command('product:rating')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
