<div class="p-2">
    <form action="/form" method="post">
        @csrf
        
        <div class="form-group mb-3">
            <label for="link">Enter link to RSS feed:</label>
            <input type="text" name="link" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="categories">Choose feed category:</label>
            <select name="categories" id="cat" class="form-select">
                <option value="tech">Technology</option>
                <option value="pol">Politics</option>
                <option value="sci">Science</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add feed</button>
    </form>
</div>