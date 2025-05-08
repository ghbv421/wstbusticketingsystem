<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conductor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800">
    <header class="bg-red-600 text-white p-6 text-center shadow-md">
        <h1 class="text-3xl font-bold">Conductor Dashboard</h1>
    </header>

    <main class="flex-1 flex flex-col items-center justify-center p-6">
        <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md w-full text-center">
            <h2 class="text-2xl font-semibold mb-4">Welcome, Conductor!</h2>
            <p class="mb-6 text-gray-600">Manage your bus routes, tickets, and schedules easily from here.</p>
            <div>
                <form action="{{ route('conductorpage') }}" method="POST">
                    @csrf
            
                    <label for="t1_id" class="block text-left mb-1 font-medium">Terminal 1:</label>
                        <select name="t1_id" id="t1_id" required class="mb-4 w-full border border-gray-300 rounded-lg p-2">
                            <option value="">Select Terminal 1</option>
                            @foreach ($terminals as $terminal)
                                <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                            @endforeach
                        </select>

                        <label for="t2_id" class="block text-left mb-1 font-medium">Terminal 2:</label>
                        <select name="t2_id" id="t2_id" required class="mb-4 w-full border border-gray-300 rounded-lg p-2">
                            <option value="">Select Terminal 2</option>
                            @foreach ($terminals as $terminal)
                                <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                            @endforeach
                        </select>
                        <br><br>
            
                    <input type="submit" value="Calculate Distance">
                </form>
            
                <div>
                    @if(isset($distance) && isset($t1name) && isset($t2name))
                        <h1>Distance</h1>
                        <p>Distance from {{ $t1name }} to {{ $t2name }}: {{ $distance }} km</p>
                    @endif
                </div>
            </div>
            

            <a href="{{ route('logout.welcome') }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg transition">
                Log Out
            </a>
        </div>
    </main>

    <footer class="bg-red-600 text-white text-center p-4 text-sm">
        &copy; 2025 M3VALLE. All rights reserved.
    </footer>
</body>
</html>
