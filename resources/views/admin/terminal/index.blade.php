<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminal</title>
    @vite('resources/css/app.css') <!-- Adjust if using Laravel Mix or other asset manager -->
    <style>
        body::before {
            content: '';
            background: url('/images/bus2.jpg') no-repeat center center fixed;
            background-size: cover;
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            z-index: -1;
            filter: blur(4px);
        }
    </style>
</head>
<body class="min-h-screen text-white flex flex-col items-center p-10 bg-black/50">

    <h1 class="text-4xl font-bold mb-6">Terminals</h1>

    <a href="{{ route('terminals.create') }}" class="mb-6 px-6 py-2 bg-red-600 hover:bg-red-700 rounded text-white font-semibold transition">
        ➕ Add Terminal
    </a>
    <div class="text-center">
            <a href="{{ route('adminpage') }}"
               class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300 w-full text-center block">
                Back
            </a>
        </div>

    <div class="overflow-x-auto max-w-7xl bg-white/90 backdrop-blur-md rounded-xl shadow-lg">
        <table class="min-w-full table-auto text-black">
            <thead class="bg-gray-200 text-gray-800">
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
                            <a href="{{ route('terminals.edit', $terminal->id) }}" class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</a>
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
