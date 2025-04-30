<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('M3VALLE.ico') }}" type="image/x-icon">
</head>

        <!-- Title Styled Like Button -->
        <div class="mb-8">
            <button class="text-xl font-serif bg-white px-6 py-2 shadow border border-gray-400 rounded-lg flex items-center gap-2">
                <span class="text-black">Buses</span>
                <span class="text-lg">❯</span>
            </button>
        </div>

        <body class="bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('{{ asset('images/bus2.jpg') }}');">
    <div class="p-6 w-full max-w-7xl mx-4 bg-white bg-opacity-70 rounded-xl shadow-xl">

        <!-- Bus Cards -->
        <div class="flex justify-around flex-wrap gap-6 mb-10">
            <div class="text-center">
                <img src="{{ asset('images/rural.png') }}" alt="Rural Tour Bus" class="w-60 h-36 object-cover rounded-lg shadow-md">
                <button class="mt-2 px-6 py-2 bg-gray-200 text-black font-serif border border-black rounded">
                    Rural Tour Bus
                </button>
            </div>
            <div class="text-center">
                <img src="{{ asset('images/bachelor.png') }}" alt="Bachelor Tour Bus" class="w-60 h-36 object-cover rounded-lg shadow-md">
                <button class="mt-2 px-6 py-2 bg-gray-200 text-black font-serif border border-black rounded">
                    Bachelor Tour Bus
                </button>
            </div>
            <div class="text-center">
                <img src="{{ asset('images/bagonglipunan.png') }}" alt="Bagong Lipunan Bus" class="w-60 h-36 object-cover rounded-lg shadow-md">
                <button class="mt-2 px-6 py-2 bg-gray-200 text-black font-serif border border-black rounded">
                    Bagung Lipunan Bus
                </button>
            </div>
        </div>

        <!-- Bus Table -->
<!-- Bus Table -->
<div class="flex justify-center">
    <div class="w-full max-w-5xl bg-white border border-gray-400 rounded-lg shadow">
        <table class="w-full text-center">
            <thead class="bg-gray-200 text-black font-medium text-sm">
                <tr>
                    <th class="px-4 py-3 border border-gray-400">Bus Type</th>
                    <th class="px-4 py-3 border border-gray-400">Description</th>
                    <th class="px-4 py-3 border border-gray-400">Departure Time</th>
                    <th class="px-4 py-3 border border-gray-400">Arrival Time</th>
                    <th class="px-4 py-3 border border-gray-400">Driver</th>
                    <th class="px-4 py-3 border border-gray-400">Conductor</th>
                    <th class="px-4 py-3 border border-gray-400">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach ($Buses as $Bus)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->bus_type ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->description ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->departure_time ?? 'SELECT' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->arrival_time ?? 'SELECT' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->driver ?? 'SELECT' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->conductor ?? 'SELECT' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->status ?? 'SELECT' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



        <!-- Add Bus Button -->
        <div class="mt-8 text-right">
            <a href="{{ route('admin.bus.register') }}" 
               class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                Add Bus
            </a>
        </div>
    </div>
</body>
</html>
