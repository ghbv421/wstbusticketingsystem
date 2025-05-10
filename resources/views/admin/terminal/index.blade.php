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
        <div class="w-full max-w-7xl flex flex-wrap justify-between items-center mb-6">
            <div class="flex items-center gap-2 flex-wrap">
                <a class="px-4 py-2 rounded bg-white text-black shadow">
                    <p>Terminals</p>
                </a>
                <form method="GET" action="{{ route('terminal.index') }}">
                    <input type="text" name="search" placeholder="Search" value="{{ request('search') }}"
                        class="pl-10 pr-4 py-2 rounded-full bg-white text-black w-72 sm:w-96 shadow focus:outline-none focus:ring-2 focus:ring-red-400" />
                </form>
            </div>
            <div class="flex items-center gap-4 mt-2 sm:mt-0">
                <a href="{{ route('terminals.create') }}" class="px-4 py-2 bg-white hover:bg-red-700 rounded text-black font-semibold">Add Terminal</a>
                <a href="{{ route('adminpage') }}" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded text-white">Back</a>
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-black shadow">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm-6 8a6 6 0 0112 0H4z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="w-full overflow-x-auto max-w-7xl bg-white backdrop-blur-md rounded-xl shadow-lg mt-4">
            <table class="table-fixed w-full text-center text-black border border-gray-300 border-collapse">
                <thead class="bg-gray-100 text-gray-800">
                    <tr>
                        <th class="px-2 py-2 w-12 border border-gray-300">ID</th>
                        <th class="px-2 py-2 w-32 border border-gray-300">Terminal</th>
                        <th class="px-2 py-2 w-32 border border-gray-300">Contact</th>
                        <th class="px-2 py-2 w-32 border border-gray-300">Latitude</th>
                        <th class="px-2 py-2 w-32 border border-gray-300">Longitude</th>
                        <th class="px-2 py-2 w-64 border border-gray-300">Address</th>
                        <th class="px-2 py-2 w-32 border border-gray-300">City</th>
                        <th class="px-2 py-2 w-32 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($terminals as $terminal)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-2 py-2 border border-gray-300 truncate">{{ $terminal->id }}</td>
                        <td class="px-2 py-2 border border-gray-300 truncate">{{ $terminal->terminal }}</td>
                        <td class="px-2 py-2 border border-gray-300 truncate">{{ $terminal->contact }}</td>
                        <td class="px-2 py-2 border border-gray-300 truncate">{{ $terminal->latitude }}</td>
                        <td class="px-2 py-2 border border-gray-300 truncate">{{ $terminal->longitude }}</td>
                        <td class="px-2 py-2 border border-gray-300 truncate">{{ $terminal->address }}</td>
                        <td class="px-2 py-2 border border-gray-300 truncate">{{ $terminal->city }}</td>
                        <td class="px-2 py-2 border border-gray-300">
                            <div class="flex flex-row justify-center items-center gap-2">
                                <a href="{{ route('terminals.edit', $terminal->id) }}" class="px-3 py-1 bg-blue-600 text-black rounded hover:bg-blue-700">Edit</a>
                                <form action="{{ route('terminals.destroy', $terminal->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


</body>
</html>
