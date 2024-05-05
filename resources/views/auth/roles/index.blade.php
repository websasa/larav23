<!DOCTYPE html>
<html>
<head>
    <title>Roles</title>
</head>
<body>
    <h2>Roles</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route('roles.create') }}">Create New Role</a>
</body>
</html>