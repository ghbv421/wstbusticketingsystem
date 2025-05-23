<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Dispatcher</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start py-12 px-4">

    <!-- Page Header -->
    <header class="mb-12 text-center max-w-lg w-full">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Edit Dispatcher</h1>
        <p class="text-gray-600">Update the dispatcher details below</p>
    </header>

    <!-- Form Container -->
    <form action="{{ route('dispatcher.update', $dispatcher->id) }}" method="POST" class="space-y-6 bg-white p-8 rounded-2xl shadow-lg max-w-lg w-full">
        @csrf
        @method('PUT')

        <div>
            <label for="driver_id" class="block mb-2 text-gray-700 font-medium">Driver</label>
            <select id="driver_id" name="driver_id" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ $dispatcher->driver_id == $driver->id ? 'selected' : '' }}>
                        {{ $driver->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="bus_id" class="block mb-2 text-gray-700 font-medium">Bus</label>
            <select id="bus_id" name="bus_id" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($buses as $bus)
                    <option value="{{ $bus->id }}" {{ $dispatcher->bus_id == $bus->id ? 'selected' : '' }}>
                        {{ $bus->plate_no ?? $bus->bus_name ?? $bus->bus_type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="bus_type" class="block mb-2 text-gray-700 font-medium">Bus Type</label>
            <select id="bus_type" name="bus_type" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Select Bus Type</option>
                @foreach ($buses->pluck('bus_type')->unique() as $busType)
                    <option value="{{ $busType }}" {{ $dispatcher->bus_type == $busType ? 'selected' : '' }}>
                        {{ $busType }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="from_terminal_id" class="block mb-2 text-gray-700 font-medium">From Terminal</label>
            <select id="from_terminal_id" name="from_terminal_id" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($terminals as $terminal)
                    <option value="{{ $terminal->id }}" {{ $dispatcher->from_terminal_id == $terminal->id ? 'selected' : '' }}>
                        {{ $terminal->terminal }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="destination_terminal_id" class="block mb-2 text-gray-700 font-medium">To Terminal</label>
            <select id="destination_terminal_id" name="destination_terminal_id" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($terminals as $terminal)
                    <option value="{{ $terminal->id }}" {{ $dispatcher->destination_terminal_id == $terminal->id ? 'selected' : '' }}>
                        {{ $terminal->terminal }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="departure" class="block mb-2 text-gray-700 font-medium">Departure Time</label>
            <input type="datetime-local" id="departure" name="departure" value="{{ \Carbon\Carbon::parse($dispatcher->departure)->format('Y-m-d\TH:i') }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="arrival" class="block mb-2 text-gray-700 font-medium">Arrival Time</label>
            <input type="datetime-local" id="arrival" name="arrival" value="{{ \Carbon\Carbon::parse($dispatcher->arrival)->format('Y-m-d\TH:i') }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="status" class="block mb-2 text-gray-700 font-medium">Status</label>
            <select id="status" name="status" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach (['Scheduled', 'Departed', 'Arrived', 'Cancelled'] as $status)
                    <option value="{{ $status }}" {{ $dispatcher->status == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between items-center pt-6">
            <a href="{{ route('dispatcher.index') }}" class="text-red-600 hover:underline font-semibold">← Back</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-300">
                Save Changes
            </button>
        </div>
    </form>

</body>
</html>
