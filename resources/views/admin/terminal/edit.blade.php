<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Terminal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Edit Terminal</h1>

        <!-- Display errors -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded-md border border-red-300">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('terminals.update', $terminal->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="id" class="block text-gray-700 font-medium mb-1">ID</label>
                <input type="text" id="id" name="id" value="{{ $terminal->id }}" readonly
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" />
            </div>

            <div>
                <label for="terminal" class="block text-gray-700 font-medium mb-1">Terminal Name</label>
                <input type="text" id="terminal" name="terminal" value="{{ $terminal->terminal }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="contact" class="block text-gray-700 font-medium mb-1">Contact</label>
                <input type="text" id="contact" name="contact" value="{{ $terminal->contact }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="latitude" class="block text-gray-700 font-medium mb-1">Latitude</label>
                <input type="text" id="latitude" name="latitude" value="{{ $terminal->latitude }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="longitude" class="block text-gray-700 font-medium mb-1">Longitude</label>
                <input type="text" id="longitude" name="longitude" value="{{ $terminal->longitude }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="location" class="block text-gray-700 font-medium mb-1">Location</label>
                <input type="text" id="location" name="location" value="{{ $terminal->location }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Save Changes
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('admin.terminal.index') }}" class="text-red-600 hover:underline">← Back to Terminal List</a>
            </div>
        </form>
    </div>

</body>
</html>
