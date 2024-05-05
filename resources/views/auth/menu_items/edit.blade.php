<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu Item</title>
</head>
<body>
    <h2>Edit Menu Item</h2>
    <form method="POST" action="{{ route('menu_items.update', $menuItem->id) }}">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $menuItem->title }}" required>
        <label>URL:</label>
        <input type="text" name="url" value="{{ $menuItem->url }}" required>
        <label>Page:</label>
        <select name="page_id">
            @foreach($pages as $page)
                <option value="{{ $page->id }}" @if($page->id == $menuItem->page_id) selected @endif>{{ $page->title }}</option>
            @endforeach
        </select>
        <button type="submit">Update Menu Item</button>
    </form>
</body>
</html>