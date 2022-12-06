<div class="p-2">
    <h3>Form</h3>
    <form action="{{ route('feed.store') }}" method="post">
        @csrf

        <div class="form-group mb-3">
            <label for="link">Enter link to RSS feed:</label>
            <input type="url" name="link" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="category">Choose feed category:</label>
            <select name="category_id" class="form-select">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Add channel</button>
    </form>
</div>