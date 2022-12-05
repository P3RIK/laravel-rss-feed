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

        $feed = FeedReader::read($links)->get_items(0, 30);

        $categories = Category::all();
        
        return view('layouts.app', compact('feed', 'categories'));
    }


    public function add_channel(Request $req) 
    {
        $req->validate([
            'link' => 'required|unique:channels|url'
        ]);


        $feed = FeedReader::read($req->input('link'));

        $ch = new Channel;
        $ch->name = $feed->get_title();
        $ch->link = $req->input('link');
        $ch->category_id = $req->input('category');
        $ch->save();

        return redirect()->route('home');
    }

    
    public function unsubscribe(Request $req) {
        $ch = Channel::where('name', $req->feed_name)->firstOrFail();
        $ch->delete();

        return redirect()->route('home');
    }
}
