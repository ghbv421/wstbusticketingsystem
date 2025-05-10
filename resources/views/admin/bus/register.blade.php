<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Register Bus</h1>

        <form action="{{ route('admin.bus.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Bus Type -->
            <label for="bus_type" class="block mb-1 font-medium">Bus Type</label>
            <select name="bus_type" id="bus_type" class="form-select border border-gray-300 rounded-md p-2 w-full">
                <option value="Rural">Rural</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Bagong Lipunan">Bagong Lipunan</option>
            </select>

            <!-- Capacity -->
            <div>
                <label for="capacity" class="block text-gray-700 font-medium mb-1">Capacity</label>
                <input type="number" name="capacity" placeholder="e.g. 50"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
                <input type="text" name="description" placeholder="e.g. Red with stripes"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Departure Time -->
            <div>
                <label for="departure_time" class="block text-gray-700 font-medium mb-1">Departure Time</label>
                <input type="time" name="departure_time"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Arrival Time -->

            
            <div>
                <label for="arrival_time" class="block text-gray-700 font-medium mb-1">Arrival Time</label>
                <input type="time" name="arrival_time"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!--driver -->

            <div>
                <label for="driver_id" class="block text-gray-700 font-medium mb-1">Driver</label>
                <select name="driver_id" id="driver_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">SELECT</option>
                    @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach
                </select>
            </div>




            <!-- Conductor -->
            <div>
                <label for="conductor_id" class="block text-gray-700 font-medium mb-1">Conductor</label>
                <select name="conductor_id" id="conductor_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">SELECT</option>
                    @foreach($conductors as $conductor)
                        <option value="{{ $conductor->id }}">{{ $conductor->name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Status -->
            <div>
                <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">SELECT</option>
                    <option value="Available">Available</option>
                    <option value="In Transit">In Transit</option>
                    <option value="Under Maintenance">Under Maintenance</option>
                </select>
            </div>

            <!-- Submit -->
            <div>
                <input type="submit" value="Save Bus"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
            </div>

            <!-- Back Button -->
            <div class="text-center mt-4">
                <a href="{{ route('admin.bus.index') }}" 
                   class="text-red-600 hover:underline">← Back to Bus List</a>
            </div>
        </form>
    </div>

</body>
</html>