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
