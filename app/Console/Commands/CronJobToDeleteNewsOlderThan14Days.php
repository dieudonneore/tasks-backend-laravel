<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;//deleted
use DB;//deleted
use Carbon\Carbon;

class CronJobToDeleteNewsOlderThan14Days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'news older than 14 days has been deleted successfully';

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
        $currentDateTime = Carbon::now();
        $newDateTime = Carbon::now()->addDays(13);
        \DB::table('news')
        ->whereDate('created_at', '<', $newDateTime)
        ->delete();//deleted
        $this->info('news deleted Successfully!');//deleted
    }
}
