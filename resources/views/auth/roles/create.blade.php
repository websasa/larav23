<!DOCTYPE html>
<html>
<head>
    <title>Create Role</title>
</head>
<body>
    <h2>Create Role</h2>
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Description:</label>
        <input type="text" name="description" required>
        <button type="submit">Create Role</button>
    </form>
</body>
</html>