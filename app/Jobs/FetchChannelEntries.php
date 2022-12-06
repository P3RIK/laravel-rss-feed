<?php

namespace App\Jobs;

use App\Models\Entry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Vedmant\FeedReader\Facades\FeedReader;

class FetchChannelEntries implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $channel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($channel)
    {
        $this->channel = $channel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $feed = FeedReader::read($this->channel->link)->get_items(0, 30);
        
        foreach($feed as $item)
        {
            $entry = new Entry();
            $entry->title = $item->get_title();
            $entry->link = $item->get_link();
            $entry->content = $item->get_content();
            $entry->publication_date = $item->get_date();
            $entry->channel_id = $this->channel->id;
            $entry->save();
        }
    }
}
