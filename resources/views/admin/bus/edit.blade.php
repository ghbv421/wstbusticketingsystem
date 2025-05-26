<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Bus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Edit Bus</h1>

        <form action="{{ route('admin.bus.update', $bus->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="bus_type" class="block text-gray-700 font-medium mb-1">Bus Type</label>
                <input type="text" id="bus_type" name="bus_type" value="{{ old('bus_type', $bus->bus_type) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter bus type" />
                @error('bus_type')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="capacity" class="block text-gray-700 font-medium mb-1">Capacity</label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $bus->capacity) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter capacity" />
                @error('capacity')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="departure_time" class="block text-gray-700 font-medium mb-1">Departure Time</label>
                <input type="time" id="departure_time" name="departure_time" value="{{ old('departure_time', $bus->departure_time) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('departure_time')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="arrival_time" class="block text-gray-700 font-medium mb-1">Arrival Time</label>
                <input type="time" id="arrival_time" name="arrival_time" value="{{ old('arrival_time', $bus->arrival_time) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('arrival_time')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="driver_id" class="block text-gray-700 font-medium mb-1">Driver</label>
                <select id="driver_id" name="driver_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">SELECT</option>
                    @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}" {{ old('driver_id', $bus->driver_id) == $driver->id ? 'selected' : '' }}>
                            {{ $driver->name }}
                        </option>
                    @endforeach
                </select>
                @error('driver_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="conductor_id" class="block text-gray-700 font-medium mb-1">Conductor</label>
                <select id="conductor_id" name="conductor_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">SELECT</option>
                    @foreach($conductors as $conductor)
                        <option value="{{ $conductor->id }}" {{ old('conductor_id', $bus->conductor_id) == $conductor->id ? 'selected' : '' }}>
                            {{ $conductor->name }}
                        </option>
                    @endforeach
                </select>
                @error('conductor_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
                <select id="status" name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Available" {{ old('status', $bus->status) == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="In Transit" {{ old('status', $bus->status) == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                    <option value="Under Maintenance" {{ old('status', $bus->status) == 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Update Bus
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('admin.bus.index') }}" class="text-red-600 hover:underline">← Back to Bus List</a>
            </div>
        </form>
    </div>

</body>
</html>
