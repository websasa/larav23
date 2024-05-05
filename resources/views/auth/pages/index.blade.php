<!DOCTYPE html>
<html>
<head>
    <title>Pages</title>
</head>
<body>
    <h2>Pages</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach($pages as $page)
        <tr>
            <td>{{ $page->title }}</td>
            <td>{{ $page->content }}</td>
            <td><img src="{{ asset('images/' . $page->image) }}" alt="{{ $page->title }}" width="100"></td>
            <td>
                <a href="{{ route('pages.edit', $page->id) }}">Edit</a>
                <form method="POST" action="{{ route('pages.destroy', $page->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route('pages.create') }}">Create New Page</a>
</body>
</html>