<div>
    <h3>Feed</h3>
    <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach($categories as $category)
            <a class="dropdown-item" href="{{ route('home', ['category' => $category->name]) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
    
    @foreach($feed->get_items(0, 25) as $entry)
        <x-feed-entry :entry='$entry' />
    @endforeach
</div>