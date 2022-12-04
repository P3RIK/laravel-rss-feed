<div class="card mt-2">
  <h5 class="card-header">{{ $entry->get_feed()->get_title() }}</h5>
  
  <div class="card-body">
    
    <h5 class="card-title">{{ $entry->get_title() }}</h5>
    <p class="card-text">Category: </p>
    <a href="{{ $entry->get_link() }}" class="btn btn-primary btn-sm my-1">Link</a>
    <p class="card-text">{{ strip_tags($entry->get_description()) }}</p>
    <p class="card-text d-flex justify-content-end">{{ $entry->get_date() }}</p>
    
    <div class="d-flex justify-content-end">
      <a href="{{ route('route.name', $link=$entry->get_link()) }}" class="btn btn-danger">Unsubscribe</a>
    </div>

  </div>
</div>