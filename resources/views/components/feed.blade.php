<div>
    <h2>Feed</h2>
    <p>{{ $feed->get_title() }}</p>
    @foreach($feed->get_items() as $item)
        <x-feed-entry :item='$item' />
    @endforeach
</div>