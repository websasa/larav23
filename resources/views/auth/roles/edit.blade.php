<!DOCTYPE html>
<html>
<head>
    <title>Edit Role</title>
</head>
<body>
    <h2>Edit Role</h2>
    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $role->name }}" required>
        <label>Description:</label>
        <input type="text" name="description" value="{{ $role->description }}" required>
        <button type="submit">Update Role</button>
    </form>
</body>
</html>