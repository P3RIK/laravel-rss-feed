<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class FeedController extends Controller {
    public function load_feed() {
        $reader = FeedReader::read('https://news.google.com/news/rss');
        $title = $reader->get_title();
        return view('layouts.app', [
            'title' => $title,
        ]);
    }

    public function get_entries() {
        $reader = FeedReader::read('https://news.google.com/news/rss');
        $ch_title = $reader->get_title();
        return view('layouts.app', [
            'title' => $ch_title,
        ]);
    }
}
