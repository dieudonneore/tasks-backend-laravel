<?php

namespace App\Providers;

use App\Providers\NewsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SendNewsCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\NewsCreated  $event
     * @return void
     */
    public function handle(NewsCreated $event)
    {

        $newsinfo = $event->news;

        $saveHistory = DB::table('news_history')->insert(
            [
                'title' => $newsinfo->title,
                'content' => $newsinfo->content,
                'user_id' => $newsinfo->user_id,
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp
            ]
        );
        return $saveHistory;
    }
}
