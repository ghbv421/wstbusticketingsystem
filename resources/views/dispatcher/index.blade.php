<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatchers</title>
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

    <!-- Header -->
    <div class="w-full max-w-7xl flex flex-wrap justify-between items-center mb-6">
        <div class="flex items-center gap-2 flex-wrap">
            <a class="px-4 py-2 rounded bg-white text-black shadow">
                <p>Dispatcher Terminal</p>
            </a>
            
            <form method="GET" action="{{ route('dispatcher.index') }}">
                <input type="text" name="search" placeholder="Search"
                    value="{{ request('search') }}"
                    class="pl-10 pr-4 py-2 rounded-full bg-white text-black w-72 sm:w-96 shadow focus:outline-none focus:ring-2 focus:ring-red-400" />
            </form>
        </div>
        <div class="flex items-center gap-4 mt-2 sm:mt-0">
            <a href="{{ route('dispatcher.create') }}" class="px-4 py-2 bg-white hover:bg-red-700 rounded text-black font-semibold">Add</a>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                Logout
            </button>
        </form>
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-black shadow">
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="w-full overflow-x-auto max-w-7xl bg-black backdrop-blur-md rounded-xl shadow-lg mt-4">
        <table class="table-fixed w-full text-center text-black border border-gray-300 border-collapse">
            <thead class="bg-gray-100 text-gray-800">
                <tr>
                    <th class="px-2 py-2 w-12 border border-gray-300">ID</th>
                    <th class="px-2 py-2 w-32 border border-gray-300">Driver</th>
                    <th class="px-2 py-2 w-32 border border-gray-300">Bus Type</th>
                    <th class="px-2 py-2 w-32 border border-gray-300">From</th>
                    <th class="px-2 py-2 w-32 border border-gray-300">To</th>
                    <th class="px-2 py-2 w-48 border border-gray-300">Departure</th>
                    <th class="px-2 py-2 w-48 border border-gray-300">Arrival</th>
                    <th class="px-2 py-2 w-32 border border-gray-300">Status</th>
                    <th class="px-2 py-2 w-32 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dispatchers as $dispatcher)
                <tr class="bg-white">
                    <td class="px-2 py-2 border border-gray-300">{{ $dispatcher->id }}</td>
                    <td class="px-2 py-2 border border-gray-300">{{ $dispatcher->driver->name ?? 'N/A' }}</td>
                    <td class="px-2 py-2 border border-gray-300">{{ $dispatcher->bus_type }}</td>
                    <td class="px-2 py-2 border border-gray-300">{{ $dispatcher->fromTerminal->terminal ?? 'N/A' }}</td>
                    <td class="px-2 py-2 border border-gray-300">{{ $dispatcher->destinationTerminal->terminal ?? 'N/A' }}</td>
                    <td class="px-2 py-2 border border-gray-300">{{ $dispatcher->departure }}</td>
                    <td class="px-2 py-2 border border-gray-300">{{ $dispatcher->arrival }}</td>
                    <td class="px-2 py-2 border border-gray-300">{{ $dispatcher->status }}</td>
                    <td class="px-2 py-2 border border-gray-300">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('dispatcher.edit', $dispatcher->id) }}" class="px-3 py-1 bg-blue-600 text-black rounded hover:bg-blue-700">Edit</a>
                            <form action="{{ route('dispatcher.destroy', $dispatcher->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
