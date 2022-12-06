<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChannelRequest;
use App\Jobs\FetchChannelEntries;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\Category;
use App\Models\Entry;
use Vedmant\FeedReader\Facades\FeedReader;

class FeedController extends Controller 
{

    public function index(Request $request) 
    {
        $entries = Entry::orderBy('publication_date')->get();
        $categories = Category::all();

        if ($request->category) {
            $category = $categories->where('name', $request->category)->firstOrFail();
            $channels = $category->channels;
            if($channels->count() != 0)
            {
                $entries = Entry::whereBelongsTo($channels)->orderBy('publication_date')->get();
            } else {
                $entries = [];
            }
        }
        
        return view('layouts.app', compact('entries', 'categories'));
    }


    public function store(StoreChannelRequest $request) 
    {
        $validated = $request->validated();
        $feed = FeedReader::read($request->input('link'));
        $validated['name'] = $feed->get_title();
        
        $channel = Channel::create($validated);
        dispatch(new FetchChannelEntries($channel));

        return redirect()->route('feed.index');
    }

    
    public function destroy($channel_id) 
    {
        Channel::destroy($channel_id);

        return redirect()->route('feed.index');
    }
}
