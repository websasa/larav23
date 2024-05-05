<!DOCTYPE html>
<html>
<head>
    <title>Edit Page</title>
</head>
<body>
    <h2>Edit Page</h2>
    <form method="POST" action="{{ route('pages.update', $page->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $page->title }}" required>
        <label>Content:</label>
        <textarea name="content" required>{{ $page->content }}</textarea>
        <label>Image:</label>
        @if($page->image)
            <img src="{{ asset('images/' . $page->image) }}" alt="{{ $page->title }}" width="100">
        @endif
        <input type="file" name="image">
        <button type="submit">Update Page</button>
    </form>
</body>
</html>