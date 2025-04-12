<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg space-y-6">

        <h1 class="text-3xl font-bold text-center text-blue-700">{{ $employees->name }}</h1>
        

        <p class="text-lg text-gray-600"><strong>Email:</strong> {{ $employees->email }}</p>
        <p class="text-lg text-gray-600 mb-4"><strong>Position:</strong> {{ $employees->position }}</p>

        <div class="flex justify-between space-x-4">
        
            <form action="{{ route('admin.employees.destroy', $employees->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');" class="flex-grow">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">
                    Delete Employee
                </button>
            </form>

            <a href="{{ route('admin.employees.edit', $employees->id) }}" class="flex-grow text-center bg-yellow-500 text-white py-2 rounded-lg hover:bg-yellow-600 transition">
                Edit Employee
            </a>


            <a href="{{ route('admin.employees.index') }}" class="flex-grow text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Back to Employees List
            </a>
        </div>
    </div>

</body>
</html>
