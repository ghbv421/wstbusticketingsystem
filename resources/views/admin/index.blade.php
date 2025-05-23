<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('M3VALLE.ico') }}" type="image/x-icon">
</head>

<body class="bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('{{ asset('images/bus2.jpg') }}');">

    <!-- Sidebar -->
    <div id="sidebar"
        class="bg-gray-800 text-white w-64 min-h-screen fixed top-0 left-0 transform transition-transform duration-300 z-40">
        <div class="p-6 border-b border-gray-700">
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/profiles.png') }}" alt="Profile" class="w-16 h-16 rounded-full mb-2">
                <span class="text-sm font-semibold">ADMINISTRATOR USER</span>
            </div>
        </div>
        <nav class="p-4 space-y-2">
            <a href="#" class="flex items-center gap-2 py-2 px-4 hover:bg-gray-700 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 9.75L12 3l9 6.75M4.5 10.5v10.5h15V10.5M9 21V12h6v9" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('logout.welcome') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Log Out</a>
        </nav>
    </div>

    <!-- Main content -->
    <div id="main-content" class="ml-64 transition-all duration-300 min-h-screen">

        <!-- Top Navbar -->
        <header class="flex justify-between items-center bg-white px-6 py-4 shadow">
            <div class="flex items-center gap-3">
                <!-- Toggle Sidebar Button -->
                <button onclick="toggleSidebar()" class="text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Home Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 9.75L12 3l9 6.75M4.5 10.5v10.5h15V10.5M9 21V12h6v9" />
                </svg>
                <h1 class="text-xl font-semibold">Dashboard</h1>
            </div>

        </header>

        <!-- Dashboard Buttons -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-10">
            <!-- Buses -->
            <a href="{{ route('admin.bus.index') }}"
                class="bg-white text-black border-2 border-red-600 px-10 py-6 rounded-xl text-2xl text-center hover:bg-red-500 shadow hover:scale-105 transform transition">
                Buses
            </a>

            <!-- Terminals -->
            <a href="{{ route('terminal.index') }}"
                class="bg-white text-black border-2 border-red-600 px-10 py-6 rounded-xl text-2xl text-center hover:bg-red-500 shadow hover:scale-105 transform transition">
                Terminals
            </a>

            <!-- Employees -->
            <a href="{{ route('admin.employees.index') }}"
                class="bg-white text-black border-2 border-red-600 px-10 py-6 rounded-xl text-2xl text-center hover:bg-red-500 shadow hover:scale-105 transform transition">
                Employees
            </a>

            <!-- Revenues -->
            <a href="{{ route('revenue.index') }}"
                class="bg-white text-black border-2 border-red-600 px-10 py-6 rounded-xl text-2xl text-center hover:bg-red-500 shadow hover:scale-105 transform transition">
                Revenues
            </a>
        </div>
<div class="pt-40 mt-40">
    <footer class="bg-red-600 text-white text-center p-4 text-sm">
        &copy; 2025 M3VALLE. All rights reserved.
        </footer>
</div>
    </div>


    <!-- Sidebar toggle script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('main-content');

            sidebar.classList.toggle('-translate-x-full');
            if (sidebar.classList.contains('-translate-x-full')) {
                main.classList.remove('ml-64');
                main.classList.add('ml-0');
            } else {
                main.classList.remove('ml-0');
                main.classList.add('ml-64');
            }
        }

        // Responsive behavior on small screens
        window.addEventListener('DOMContentLoaded', () => {
            if (window.innerWidth < 768) {
                document.getElementById('sidebar').classList.add('-translate-x-full');
                document.getElementById('main-content').classList.remove('ml-64');
                document.getElementById('main-content').classList.add('ml-0');
            }
        });
    </script>
    

</body>

</html>
