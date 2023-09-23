<!DOCTYPE html>
<html>
<head>
    <title>Create Menu Item</title>
</head>
<body>
    <h2>Create Menu Item</h2>
    <form method="POST" action="{{ route('menu_items.store') }}">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>URL:</label>
        <input type="text" name="url" required>
        <label>Page:</label>
        <select name="page_id">
            @foreach($pages as $page)
                <option value="{{ $page->id }}">{{ $page->title }}</option>
            @endforeach
        </select>
        <button type="submit">Create Menu Item</button>
    </form>
</body>
</html>