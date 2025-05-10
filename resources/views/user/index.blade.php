<!-- resources/views/conductor_dashboard.blade.php -->
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

            <form action="{{ route('calculate.distance') }}" method="POST">
                @csrf
                <label for="t1_id" class="block text-left mb-1 font-medium">Terminal 1:</label>
                <select name="t1_id" id="t1_id" required class="mb-4 w-full border border-gray-300 rounded-lg p-2">
                    <option value="">From:</option>
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}">{{ $terminal->terminal }}</option>
                    @endforeach
                </select>

                <label for="t2_id" class="block text-left mb-1 font-medium">Terminal 2:</label>
                <select name="t2_id" id="t2_id" required class="mb-4 w-full border border-gray-300 rounded-lg p-2">
                    <option value="">To:</option>
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}">{{ $terminal->terminal }}</option>
                    @endforeach
                </select>

                <input type="submit" value="Calculate Distance" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md cursor-pointer">
            </form>

            @if(isset($price) && isset($t1name) && isset($t2name) && $t1name !== '' && $t2name !== '')
                <div id="ticketPreview" class="mt-6 bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-red-600">Ticket Preview</h2>
                    <p><strong>From:</strong> {{ $t1name }}</p>
                    <p><strong>To:</strong> {{ $t2name }}</p>
                    <p><strong>Price:</strong> Php {{ number_format($price, 2) }}</p>
                    <p><strong>Discount:</strong> Php 0.00</p> <!-- Discount logic here if needed -->
                    <p><strong>Total:</strong> Php {{ number_format($price, 2) }}</p>

                    <!-- Button to print the ticket -->
                    <a href="{{ route('print.ticket', ['t1name' => $t1name, 't2name' => $t2name, 'price' => $price]) }}" 
                        class="mt-4 inline-block bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition">
                        Print Ticket
                    </a>
                </div>
            @endif
            
            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-black font-medium py-2 px-4 rounded transition duration-200">
                        Logout
                    </button>
            </form>
        </div>
    </main>

    <footer class="bg-red-600 text-white text-center p-4 text-sm">
        &copy; 2025 M3VALLE. All rights reserved.
    </footer>
</body>
</html>
