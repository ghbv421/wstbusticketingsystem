<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Register Bus</h1>

        <form action="{{ route('admin.bus.store') }}" method="POST" class="space-y-5">
            @csrf
            @method('post')

            <div>
                <label for="bus_type" class="block text-gray-700 font-medium mb-1">Bus Type</label>
                <input type="text" name="bus_type" placeholder="Type"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
                <input type="text" name="description" placeholder="Description"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <input type="submit" value="Save Bus"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
            </div>
        </form>
    </div>

</body>
</html>

