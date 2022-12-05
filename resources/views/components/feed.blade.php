<div class="p-2">
    <h3>Feed</h3>
    <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
        </a>

        <a class="btn btn-secondary" href="{{ route('home') }}">Reset</a>
        
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach($categories as $category)
            <a class="dropdown-item" href="{{ route('home', ['category' => $category->name]) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
    
    @foreach($feed as $entry)
        <x-feed-entry :entry='$entry' />
    @endforeach
</div>