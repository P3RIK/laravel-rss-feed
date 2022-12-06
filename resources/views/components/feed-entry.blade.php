@php
    $channel_id = $entry->channel->id
@endphp

<div class="card mt-2">
    <h5 class="card-header">{{ $entry->channel->name }}</h5>
  
    <div class="card-body">
        <h5 class="card-title">{{ $entry->title }}</h5>
        <a href="{{ $entry->link }}" class="btn btn-primary btn-sm my-1">Link</a>
        <p class="card-text">{!! $entry->content !!}</p>
        <p class="card-text d-flex justify-content-end">{{ $entry->publication_date }}</p>
    
        <div class="d-flex justify-content-end">
            <form action="/feed/{{ $channel_id }}" method='POST'>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Unsubscribe</button>
            </form>
        </div>
    </div>
</div>