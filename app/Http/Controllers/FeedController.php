<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;
use App\Models\Channel;

class FeedController extends Controller {
    public function load_feed() {
        
        $channels = array();

        foreach (Channel::all() as $channel) {
            array_push($channels, $channel->link);
        }

        $feed = FeedReader::read($channels);
        
        return view('layouts.app', [
            'feed' => $feed,
        ]);
    }

    public function add_channel(Request $req) {
        $ch = new Channel;
        $ch->link = $req->input('feed_link');
        $ch->category = $req->input('feed_category');
        
        $ch->save();

        return redirect()->route('home');
    }

    public function unsubscribe(Request $req) {

    }
}
