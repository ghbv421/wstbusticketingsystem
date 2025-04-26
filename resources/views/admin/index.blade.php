<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<link rel="icon" href="{{ asset('M3VALLE.ico') }}" type="image/x-icon">

<body class="flex items-center justify-center min-h-screen"
    style="background-image: url('images/bg3.png'); 
           background-size: cover; 
           background-position: center; 
           background-repeat: no-repeat;
           background-attachment: fixed;">

           <div>
            <a href="{{route('logout.welcome')}}">log out</a>
           </div>

    <div class="w-full max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-2xl">

        <h1 class="text-4xl font-extrabold text-center text-black mb-8">Admin Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Manage Buses Button -->
            <div class="flex justify-center">
                <a href="{{ route('admin.bus.index') }}"
                    class="bg-red-600 text-white px-8 py-4 rounded-xl text-xl text-center hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-md">
                    <span class="font-semibold">Manage Buses</span>
                </a>
            </div>

            <!-- Manage Employees Button -->
            <div class="flex justify-center">
                <a href="{{ route('admin.employees.index') }}"
                    class="bg-blue-600 text-white px-8 py-4 rounded-xl text-xl text-center hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 shadow-md">
                    <span class="font-semibold">Manage Employees</span>
                </a>
            </div>

            <!-- Manage Revenue Button -->
            <div class="flex justify-center">
                <a href="{{ route('revenue.index') }}"
                    class="bg-green-600 text-white px-8 py-4 rounded-xl text-xl text-center hover:bg-green-700 transition-all duration-300 transform hover:scale-105 shadow-md">
                    <span class="font-semibold">Manage Revenue</span>
                </a>
            </div>

        </div>

        <div class="mt-10 text-center">
            <p class="text-gray-600 text-lg">Select an option above to manage the system.</p>
        </div>

    </div>

</body>

</html>
