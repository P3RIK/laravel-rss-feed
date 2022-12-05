<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;
use App\Models\Channel;
use App\Models\Category;

class FeedController extends Controller {

    public function index(Request $request) 
    {
        $links = [];

        $categories = Category::all();

        if($request->category) {
            $channels = Category::where('name', $request->category)->firstOrFail()->channels()->paginate();
            foreach ($channels as $channel) {
                array_push($links, $channel->link);
            }
        } else {
            foreach (Channel::all() as $channel) {
                array_push($links, $channel->link);
            }
        }

        $feed = FeedReader::read($links)->get_items(0, 30);
        
        return view('layouts.app', compact('feed', 'categories'));
    }


    public function store(Request $request) 
    {
        $request->validate([
            'link' => 'required|unique:channels|url'
        ]);


        $feed = FeedReader::read($request->input('link'));

        $channel = new Channel;
        $channel->name = $feed->get_title();
        $channel->link = $request->input('link');
        $channel->category_id = $request->input('category');
        $channel->save();

        return redirect()->route('index');
    }

    
    public function destroy(Request $request) 
    {
        $channel = Channel::where('name', $request->feed_name)->firstOrFail();
        $channel->delete();

        return redirect()->route('index');
    }
}
