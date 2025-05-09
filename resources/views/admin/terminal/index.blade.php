<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminals</title>
    @vite('resources/css/app.css')
    <style>
        body::before {
            content: '';
            background: url('{{ asset('images/bus2.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            z-index: -1;
            filter: blur(6px);
        }
    </style>
</head>
<body class="min-h-screen text-black flex flex-col items-center p-6 bg-black/60 relative">

    <!-- Dropdown + Search -->
    <div class="w-full max-w-7xl flex justify-between items-center mb-6">
        <div class="flex items-center gap-2">
            <a class="px-4 py-2 rounded bg-white text-black shadow">
                <p>Terminals</p>
                <!-- Add more options dynamically if needed -->
    </a>
            <div class="relative">
                <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 rounded-full bg-white text-black w-96 shadow" />
            </div>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('terminals.create') }}" class="px-4 py-2 bg-white hover:bg-red-700 rounded text-black font-semibold">Add Terminal</a>
            <a href="{{ route('adminpage') }}" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded text-white">Back</a>
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-black shadow">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 10a4 4 0 100-8 4 4 0 000 8zm-6 8a6 6 0 0112 0H4z"/></svg>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto max-w-7xl mx-auto w-full bg-white backdrop-blur-md rounded-xl shadow-lg mt-8">
        <table class="min-w-full table-auto text-black">
            <thead class="bg-gray-100 text-gray-800">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Terminal</th>
                    <th class="px-4 py-2">Capacity</th>
                    <th class="px-4 py-2">Contact</th>
                    <th class="px-4 py-2">Latitude</th>
                    <th class="px-4 py-2">Longitude</th>
                    <th class="px-4 py-2">Address</th>
                    <th class="px-4 py-2">City</th>
                    <th class="px-4 py-2">State</th>
                    <th class="px-4 py-2">Country</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($terminals as $terminal)
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="px-4 py-2">{{ $terminal->id }}</td>
                    <td class="px-4 py-2">{{ $terminal->terminal }}</td>
                    <td class="px-4 py-2">{{ $terminal->capacity }}</td>
                    <td class="px-4 py-2">{{ $terminal->contact }}</td>
                    <td class="px-4 py-2">{{ $terminal->latitude }}</td>
                    <td class="px-4 py-2">{{ $terminal->longitude }}</td>
                    <td class="px-4 py-2">{{ $terminal->address }}</td>
                    <td class="px-4 py-2">{{ $terminal->city }}</td>
                    <td class="px-4 py-2">{{ $terminal->state }}</td>
                    <td class="px-4 py-2">{{ $terminal->country }}</td>
                    <td class="px-4 py-2 space-y-2">
                        <a href="{{ route('terminals.edit', $terminal->id) }}" class="inline-block px-3 py-1 bg-blue-600 text-black rounded hover:bg-blue-700">Edit</a>
                        <form action="{{ route('terminals.destroy', $terminal->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
