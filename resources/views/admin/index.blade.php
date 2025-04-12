<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-center text-blue-700 mb-8">Admin Dashboard</h1>
        

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="flex justify-center">
                <a href="{{ route('admin.bus.index') }}" class="bg-green-600 text-white px-8 py-4 rounded-lg text-xl text-center hover:bg-green-700 transition duration-300 transform hover:scale-105">
                    <span class="font-semibold">Manage Buses</span>
                </a>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('admin.employees.index') }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-xl text-center hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                    <span class="font-semibold">Manage Employees</span>
                </a>
            </div>
        </div>
        

        <div class="mt-8 text-center">
            <p class="text-gray-600 text-lg">Select an option above to manage the system.</p>
        </div>
    </div>

</body>

</html>
