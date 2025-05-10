<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatcher</title>
</head>
<body>
    <h1>
        Dispatcher
    </h1>
    <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-black font-medium py-2 px-4 rounded transition duration-200">
                Logout
            </button>
    </form>
</body>
</html>