<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Terminal</title>
</head>
<body>
    <h1>Edit Terminal</h1>

    <!-- Display errors if any -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Terminal Form -->
    <form action="{{ route('terminals.edit', $terminal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" value="{{ $terminal->id }}" readonly>
        </div>

        <div>
            <label for="terminal">Terminal Name:</label>
            <input type="text" id="terminal" name="terminal" value="{{ $terminal->terminal }}" required>
        </div>

        <div>
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="{{ $terminal->contact }}" required>
        </div>

        <div>
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="{{ $terminal->latitude }}" required>
        </div>

        <div>
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="{{ $terminal->longitude }}" required>
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ $terminal->address }}" required>
        </div>

        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ $terminal->city }}" required>
        </div>

        <div>
            <button type="submit">Save Changes</button>
        </div>
    </form>

    <a href="{{ route('admin.terminal.index') }}">Back to Terminal List</a>
</body>
</html>
