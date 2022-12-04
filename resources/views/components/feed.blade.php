<div>
    <h3>Feed</h3>
    
    @foreach($feed->get_items() as $entry)
        <x-feed-entry :entry='$entry' />
    @endforeach
</div>