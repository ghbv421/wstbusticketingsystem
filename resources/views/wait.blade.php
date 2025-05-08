{{-- resources/views/auth/wait.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wait for Admin</title>
</head>
<body>
    <h1>Your account is pending approval.</h1>
    <p>Please wait for the admin to assign your position.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
