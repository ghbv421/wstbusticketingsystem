<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Terminal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Add Terminal</h1>

        <form action="{{ route('terminals.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Terminal -->
            <div>
                <label for="terminal" class="block text-gray-700 font-medium mb-1">Terminal</label>
                <input type="text" id="terminal" name="terminal"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Contact -->
            <div>
                <label for="contact" class="block text-gray-700 font-medium mb-1">Contact</label>
                <input type="text" id="contact" name="contact"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Latitude -->
            <div>
                <label for="latitude" class="block text-gray-700 font-medium mb-1">Latitude</label>
                <input type="number" step="any" id="latitude" name="latitude"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Longitude -->
            <div>
                <label for="longitude" class="block text-gray-700 font-medium mb-1">Longitude</label>
                <input type="number" step="any" id="longitude" name="longitude"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="block text-gray-700 font-medium mb-1">Location</label>
                <input type="text" id="location" name="location"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>


            <!-- Submit -->
            <div>
                <input type="submit" value="Save Terminal"
                       class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
            </div>

            <!-- Back Button -->
            <div class="text-center mt-4">
                <a href="{{ route('terminal.index') }}" class="text-red-600 hover:underline">← Back to Terminal List</a>
            </div>
        </form>
    </div>

</body>
</html>
