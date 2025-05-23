<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Dispatcher</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Edit Details</h1>
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Update Details Below</h1>

        <form action="{{ route('dispatcher.update', $dispatcher->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="driver_id" class="block text-gray-700 font-medium mb-1">Driver</label>
                <select id="driver_id" name="driver_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}" {{ $dispatcher->driver_id == $driver->id ? 'selected' : '' }}>
                            {{ $driver->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="bus_id" class="block text-gray-700 font-medium mb-1">Bus</label>
                <select id="bus_id" name="bus_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->id }}" {{ $dispatcher->bus_id == $bus->id ? 'selected' : '' }}>
                            {{ $bus->plate_no ?? $bus->bus_name ?? $bus->bus_type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="bus_type" class="block text-gray-700 font-medium mb-1">Bus Type</label>
                <select id="bus_type" name="bus_type"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Bus Type</option>
                    @foreach ($buses->pluck('bus_type')->unique() as $busType)
                        <option value="{{ $busType }}" {{ $dispatcher->bus_type == $busType ? 'selected' : '' }}>
                            {{ $busType }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="from_terminal_id" class="block text-gray-700 font-medium mb-1">From Terminal</label>
                <select id="from_terminal_id" name="from_terminal_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}" {{ $dispatcher->from_terminal_id == $terminal->id ? 'selected' : '' }}>
                            {{ $terminal->terminal }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="destination_terminal_id" class="block text-gray-700 font-medium mb-1">To Terminal</label>
                <select id="destination_terminal_id" name="destination_terminal_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}" {{ $dispatcher->destination_terminal_id == $terminal->id ? 'selected' : '' }}>
                            {{ $terminal->terminal }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="departure" class="block text-gray-700 font-medium mb-1">Departure Time</label>
                <input type="datetime-local" id="departure" name="departure"
                    value="{{ \Carbon\Carbon::parse($dispatcher->departure)->format('Y-m-d\TH:i') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="arrival" class="block text-gray-700 font-medium mb-1">Arrival Time</label>
                <input type="datetime-local" id="arrival" name="arrival"
                    value="{{ \Carbon\Carbon::parse($dispatcher->arrival)->format('Y-m-d\TH:i') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
                <select id="status" name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach (['Scheduled', 'Departed', 'Arrived', 'Cancelled'] as $status)
                        <option value="{{ $status }}" {{ $dispatcher->status == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Update Dispatcher
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('dispatcher.index') }}" class="text-red-600 hover:underline">← Back to Dispatcher List</a>
            </div>
        </form>
    </div>

</body>
</html>
