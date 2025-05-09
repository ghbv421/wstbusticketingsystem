<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Edit Bus</h1>

        <form action="{{ route('admin.bus.update', $bus->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Driver -->
            <div>
                <label for="driver" class="block text-gray-700 font-medium mb-1">Driver</label>
                <input type="text" name="driver" value="{{ old('driver', $bus->driver) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter driver name">
            </div>

            <!-- Conductor -->
            <div>
                <label for="conductor" class="block text-gray-700 font-medium mb-1">Conductor</label>
                <input type="text" name="conductor" value="{{ old('conductor', $bus->conductor) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter conductor name">
            </div>

            <!-- Departure Time -->
            <div>
                <label for="departure_time" class="block text-gray-700 font-medium mb-1">Departure Time</label>
                <input type="time" name="departure_time" value="{{ old('departure_time', $bus->departure_time) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Arrival Time -->
            <div>
                <label for="arrival_time" class="block text-gray-700 font-medium mb-1">Arrival Time</label>
                <input type="time" name="arrival_time" value="{{ old('arrival_time', $bus->arrival_time) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Available" {{ old('status', $bus->status) == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="In Transit" {{ old('status', $bus->status) == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                    <option value="Under Maintenance" {{ old('status', $bus->status) == 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Update Bus
                </button>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-4">
                <a href="{{ route('admin.bus.index') }}" class="text-red-600 hover:underline">← Back to Bus List</a>

</body>
</html>
