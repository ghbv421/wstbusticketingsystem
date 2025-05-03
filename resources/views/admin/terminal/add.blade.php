<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Terminal</title>
    @vite('resources/css/app.css') <!-- Or use <link> if using CDN -->
    <style>
        body::before {
            content: '';
            background: url('/images/bus2.jpg') no-repeat center center fixed;
            background-size: cover;
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            z-index: -1;
            filter: blur(4px);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-black/50 text-white">

    <div class=" max-w-2xl bg-white/90 text-black rounded-xl shadow-xl p-8 backdrop-blur-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Add Terminal</h1>

        <form action="{{ route('terminals.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name">Terminal:</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div>
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div>
                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div>
                <label for="latitude">Latitude:</label>
                <input type="number" step="any" id="latitude" name="latitude" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div>
                <label for="longitude">Longitude:</label>
                <input type="number" step="any" id="longitude" name="longitude" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div>
                <label for="city">City:</label>
                <input type="text" id="city" name="city" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div>
                <label for="state">State:</label>
                <input type="text" id="state" name="state" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div>
                <label for="country">Country:</label>
                <input type="text" id="country" name="country" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="flex justify-between items-center mt-6">
                <input type="submit" value="Submit"
                       class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                <a href="{{ route('admin.terminal.index') }}"
                    class="bg-gray-700 text-white px-6 py-2 rounded hover:bg-gray-800 transition">
                     Back
                </a>
            </div>
        </form>
    </div>
</body>
</html>
