<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class FeedController extends Controller {
    public function load_feed() {
        $feed = FeedReader::read('https://feeds.simplecast.com/54nAGcIl');
        return view('layouts.app', [
            'feed' => $feed,
        ]);
    }

    public function get_entries() {
        $feed = FeedReader::read('https://news.google.com/news/rss');
        $ch_title = $feed->get_title();
        return view('layouts.app', [
            'title' => $ch_title,
        ]);
    }
}
