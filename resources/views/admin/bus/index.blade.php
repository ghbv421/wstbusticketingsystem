<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('M3VALLE.ico') }}" type="image/x-icon">
</head>

<body class="bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('{{ asset('images/bus2.jpg') }}');">
    <div class="min-h-screen flex flex-col items-center py-8 px-4 bg-white bg-opacity-70 rounded-xl shadow-xl">

        <!-- Title Section -->
        <div class="mb-8">
            <button class="text-xl font-serif bg-white px-6 py-2 shadow border border-gray-400 rounded-lg flex items-center gap-2">
                <span class="text-black">Buses</span>
                <span class="text-lg">❯</span>
            </button>
        </div>

        <!-- Bus Cards Section - Filter Controls -->
        <div class="flex justify-center gap-6 mb-10 flex-wrap" id="bus-filters">
            <div class="text-center bg-white p-4 rounded-lg shadow-md cursor-pointer filter-item active-filter" data-type="all">
                <img src="{{ asset('images/all.png') }}" alt="All Buses" class="w-60 h-36 object-cover rounded-lg shadow-md">
                <button class="mt-2 px-6 py-2 bg-blue-500 text-white font-serif border border-blue-500 rounded">
                    All Buses
                </button>
            </div>
            <div class="text-center bg-white p-4 rounded-lg shadow-md cursor-pointer filter-item" data-type="Rural">
                <img src="{{ asset('images/rural.png') }}" alt="Rural Tour Bus" class="w-60 h-36 object-cover rounded-lg shadow-md">
                <button class="mt-2 px-6 py-2 bg-gray-200 text-black font-serif border border-black rounded">
                    Rural Tour Bus
                </button>
            </div>
            <div class="text-center bg-white p-4 rounded-lg shadow-md cursor-pointer filter-item" data-type="Bachelor">
                <img src="{{ asset('images/bachelor.png') }}" alt="Bachelor Tour Bus" class="w-60 h-36 object-cover rounded-lg shadow-md">
                <button class="mt-2 px-6 py-2 bg-gray-200 text-black font-serif border border-black rounded">
                    Bachelor Tour Bus
                </button>
            </div>
            <div class="text-center bg-white p-4 rounded-lg shadow-md cursor-pointer filter-item" data-type="Bagong Lipunan">
                <img src="{{ asset('images/bagonglipunan.png') }}" alt="Bagong Lipunan Bus" class="w-60 h-36 object-cover rounded-lg shadow-md">
                <button class="mt-2 px-6 py-2 bg-gray-200 text-black font-serif border border-black rounded">
                    Bagong Lipunan Bus
                </button>
            </div>
        </div>

        <!-- Bus Table Section -->
        <div class="w-full max-w-6xl bg-white border border-gray-400 rounded-lg shadow mb-8 overflow-x-auto">
            <table class="w-full text-center">
                <thead class="bg-gray-200 text-black font-medium text-sm">
                    <tr>
                        <th class="px-4 py-3 border border-gray-400">Bus Type</th>
                        <th class="px-4 py-3 border border-gray-400">Capacity</th>
                        <th class="px-4 py-3 border border-gray-400">Description</th>
                        <th class="px-4 py-3 border border-gray-400">Departure Time</th>
                        <th class="px-4 py-3 border border-gray-400">Arrival Time</th>
                        <th class="px-4 py-3 border border-gray-400">Driver</th>
                        <th class="px-4 py-3 border border-gray-400">Conductor</th>
                        <th class="px-4 py-3 border border-gray-400">Status</th>
                        <th class="px-4 py-3 border border-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800" id="bus-table-body">
                @foreach ($Buses as $Bus)
                    <tr class="hover:bg-gray-100 transition bus-row" data-type="{{ $Bus->bus_type ?? '' }}">
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->bus_type ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->capacity ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->description ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->departure_time ?? 'SELECT' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->arrival_time ?? 'SELECT' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->driver->name ?? 'SELECT' }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $Bus->conductor->name ?? 'SELECT' }}</td>
                        <td class="px-4 py-2 border border-gray-400">
                            <span class="px-2 py-1 rounded-full text-xs 
                                @if($Bus->status == 'Available') bg-green-100 text-green-800
                                @elseif($Bus->status == 'In Transit') bg-yellow-100 text-yellow-800
                                @elseif($Bus->status == 'Under Maintenance') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $Bus->status ?? 'SELECT' }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border border-gray-400 flex gap-2 justify-center">
                            <a href="{{ route('admin.bus.edit', $Bus->id) }}" 
                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Edit</a>
                            <form action="{{ route('admin.bus.destroy', $Bus->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
                                        onclick="return confirm('Are you sure you want to delete this bus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            </table>
        </div>

        <!-- Action Buttons Section -->
        <div class="w-full max-w-xs">
            <!-- Add Bus Button -->
            <div class="text-right mb-6">
                <a href="{{ route('admin.bus.register') }}" 
                   class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300 w-full text-center block">
                    Add Bus
                </a>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('adminpage') }}" 
                   class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300 w-full text-center block">
                    Back
                </a>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterItems = document.querySelectorAll('.filter-item');
            const busRows = document.querySelectorAll('.bus-row');
            
            filterItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all filters
                    filterItems.forEach(filter => {
                        filter.classList.remove('active-filter', 'ring-2', 'ring-blue-500');
                        filter.querySelector('button').classList.remove('bg-blue-500', 'text-white', 'border-blue-500');
                        filter.querySelector('button').classList.add('bg-gray-200', 'text-black', 'border-black');
                    });
                    
                    // Add active class to clicked filter
                    this.classList.add('active-filter', 'ring-2', 'ring-blue-500');
                    const button = this.querySelector('button');
                    button.classList.remove('bg-gray-200', 'text-black', 'border-black');
                    button.classList.add('bg-blue-500', 'text-white', 'border-blue-500');
                    
                    const filterType = this.getAttribute('data-type');
                    
                    // Filter the buses
                    busRows.forEach(row => {
                        const rowType = row.getAttribute('data-type');
                        
                        if (filterType === 'all' || rowType === filterType) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>

    <style>
        .filter-item {
            transition: all 0.2s ease;
        }
        .filter-item:hover {
            transform: translateY(-2px);
        }
        .active-filter {
            box-shadow: 0 0 0 2px #3b82f6;
        }
    </style>
    
</body>
</html>