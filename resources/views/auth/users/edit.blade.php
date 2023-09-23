<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <button type="submit">Update Profile</button>
    </form>
</body>
</html>