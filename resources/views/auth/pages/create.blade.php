<!DOCTYPE html>
<html>
<head>
    <title>Create Page</title>
</head>
<body>
    <h2>Create Page</h2>
    <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Content:</label>
        <textarea name="content" required></textarea>
        <label>Image:</label>
        <input type="file" name="image" required>
        <button type="submit">Create Page</button>
    </form>
</body>
</html>