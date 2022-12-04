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
                <option value="1">Technology</option>
                <option value="2">Politics</option>
                <option value="3">Science</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add channel</button>
    </form>
</div>