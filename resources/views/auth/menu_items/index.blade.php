<!DOCTYPE html>
<html>
<head>
    <title>Menu Items</title>
</head>
<body>
    <h2>Menu Items</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>URL</th>
            <th>Page</th>
            <th>Action</th>
        </tr>
        @foreach($menuItems as $menuItem)
        <tr>
            <td>{{ $menuItem->title }}</td>
            <td>{{ $menuItem->url }}</td>
            <td>{{ $menuItem->page->title }}</td>
            <td>
                <a href="{{ route('menu_items.edit', $menuItem->id) }}">Edit</a>
                <form method="POST" action="{{ route('menu_items.destroy', $menuItem->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route('menu_items.create') }}">Create New Menu Item</a>
</body>
</html>