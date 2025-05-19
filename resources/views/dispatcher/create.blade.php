<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dispatcher</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background: url('{{ asset('images/bus2.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
    </style>
</head>
<body class="bg-black/60">

    <div class="bg-white backdrop-blur-md rounded-2xl shadow-2xl max-w-lg mx-auto p-6">
        <h1 class="text-2x8 font-bold text-center pt-4 pb-2">CREATE</h1>

        <form action="{{ route('dispatcher.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="driver_id" class="block font-semibold mb-1">Driver</label>
                <select id="driver_id" name="driver_id" class="w-full px-4 py-1 border rounded-lg" required>
                    <option value="">Select Driver</option>
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="bus_type" class="block font-semibold mb-1">Bus_type</label>
                <select id="bus_type" name="bus_type" class="w-full px-4 py-1 border rounded-lg" required>
                    <option value="">Select Bus</option>
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->bus_type }}">{{ $bus->bus_name ?? $bus->bus_type }}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label for="from_terminal_id" class="block font-semibold mb-1">From Terminal</label>
                <select id="from_terminal_id" name="from_terminal_id" class="w-full px-4 py-1 border rounded-lg" required>
                    <option value="">Select Terminal</option>
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}">{{ $terminal->terminal }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="destination_terminal_id" class="block font-semibold mb-1">To Terminal</label>
                <select id="destination_terminal_id" name="destination_terminal_id" class="w-full px-4 py-1 border rounded-lg" required>
                    <option value="">Select Terminal</option>
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}">{{ $terminal->terminal }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="departure" class="block font-semibold mb-1">Departure Time</label>
                <input type="datetime-local" id="departure" name="departure" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="arrival" class="block font-semibold mb-1">Arrival Time</label>
                <input type="datetime-local" id="arrival" name="arrival" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="status" class="block font-semibold mb-1">Status</label>
                <select id="status" name="status" class="w-full px-4 py-1 border rounded-lg" required>
                    <option value="Scheduled">Scheduled</option>
                    <option value="Departed">Departed</option>
                    <option value="Arrived">Arrived</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

            <div class="flex justify-between items-center pt-6">
                <a href="{{ route('dispatcher.index') }}" class="text-red-600 hover:underline">← Back</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black px-6 py-2 rounded-lg">
                    Save
                </button>
            </div>
        </form>
    </div>

</body>
</html>
