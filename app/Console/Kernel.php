<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        '\App\Console\Commands\CronJob',//added
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // run job every day
        $schedule->command('CronJob:cronjob')->daily();

        //run job to delete every 14 days
        // ->cron('0 0 */14 * *');

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
