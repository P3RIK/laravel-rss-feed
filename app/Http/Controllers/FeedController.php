<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;
use App\Models\Channel;
use App\Models\Category;

class FeedController extends Controller {

    public function load_feed(Request $req) 
    {
        $links = array();

        if($req->category) {
            $channels = Category::where('name', $req->category)->firstOrFail()->channels()->paginate();
            foreach ($channels as $channel) {
                array_push($links, $channel->link);
            }
        } else {
            foreach (Channel::all() as $channel) {
                array_push($links, $channel->link);
            }
        }

        $feed = FeedReader::read($links);

        $categories = Category::all();
        
        return view('layouts.app', compact('feed', 'categories'));
    }

    public function add_channel(Request $req) 
    {
        $feed = FeedReader::read($req->input('feed_link'));

        $ch = new Channel;
        $ch->name = $feed->get_title();
        $ch->link = $req->input('feed_link');
        $ch->category_id = $req->input('feed_category');
        $ch->save();

        return redirect()->route('home');
    }

    public function unsubscribe(Request $req) {
        $ch = Channel::where('name', $req->feed_name)->firstOrFail();
        $ch->delete();

        return redirect()->route('home');
    }
}
