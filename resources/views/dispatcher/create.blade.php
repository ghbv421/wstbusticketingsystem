<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dispatcher</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Add Dispatcher</h1>

        <form action="{{ route('dispatcher.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Driver -->
            <div>
                <label for="driver_id" class="block text-gray-700 font-medium mb-1">Driver</label>
                <select id="driver_id" name="driver_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Driver</option>
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Conductor -->
            <div>
                <label for="conductor_id" class="block text-gray-700 font-medium mb-1">Conductor</label>
                <select id="conductor_id" name="conductor_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Conductor</option>
                    @foreach ($conductors as $conductor)
                        <option value="{{ $conductor->id }}">{{ $conductor->name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Bus -->
            <div>
                <label for="bus_id" class="block text-gray-700 font-medium mb-1">Bus</label>
                <select id="bus_id" name="bus_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Bus</option>
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->bus_name ?? $bus->bus_type }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Bus Type -->
            <div>
                <label for="bus_type" class="block text-gray-700 font-medium mb-1">Bus Type</label>
                <select id="bus_type" name="bus_type"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Bus Type</option>
                    @foreach ($busTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <!-- From Terminal -->
            <div>
                <label for="from_terminal_id" class="block text-gray-700 font-medium mb-1">From Terminal</label>
                <select id="from_terminal_id" name="from_terminal_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Terminal</option>
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}">{{ $terminal->terminal }}</option>
                    @endforeach
                </select>
            </div>

            <!-- To Terminal -->
            <div>
                <label for="destination_terminal_id" class="block text-gray-700 font-medium mb-1">To Terminal</label>
                <select id="destination_terminal_id" name="destination_terminal_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Terminal</option>
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}">{{ $terminal->terminal }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Departure Time -->
            <div>
                <label for="departure" class="block text-gray-700 font-medium mb-1">Departure Time</label>
                <input type="datetime-local" id="departure" name="departure"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Arrival Time -->
            <div>
                <label for="arrival" class="block text-gray-700 font-medium mb-1">Arrival Time</label>
                <input type="datetime-local" id="arrival" name="arrival"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
                <select id="status" name="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="Scheduled">Scheduled</option>
                    <option value="Departed">Departed</option>
                    <option value="Arrived">Arrived</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Save Dispatcher
                </button>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-4">
                <a href="{{ route('dispatcher.index') }}" class="text-red-600 hover:underline">← Back to Dispatcher List</a>
            </div>
        </form>
    </div>

</body>
</html>
