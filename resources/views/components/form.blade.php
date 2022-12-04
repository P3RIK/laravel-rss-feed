<div class="p-2">
    <h3>Form</h3>
    <form action="{{ route('addchannel') }}" method="post">
        @csrf
        
        <div class="form-group mb-3">
            <label for="link">Enter link to RSS feed:</label>
            <input type="text" name="feed_link" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="feed_category">Choose feed category:</label>
            <select name="feed_category" class="form-select">
                <option value="tech">Technology</option>
                <option value="pol">Politics</option>
                <option value="sci">Science</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add channel</button>
    </form>
</div>