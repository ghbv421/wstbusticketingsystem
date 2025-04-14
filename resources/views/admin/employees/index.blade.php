<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('M3VALLE.ico') }}" type="image/x-icon">
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen p-6">
<body class="flex items-center justify-center min-h-screen" 
      style="background-image: url('images/b3.png'); 
             background-size: cover; 
             background-position: center; 
             background-repeat: no-repeat;
             background-attachment: fixed;">

    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-8">Employee List</h1>

        @if($employees->isEmpty())
            <p class="text-center text-gray-500">No employees found.</p>
        @else
            <div class="overflow-x-auto bg-white rounded-lg shadow p-6 mb-8">
                <table class="w-full table-auto">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="text-left px-4 py-2">Name</th>
                            <th class="text-left px-4 py-2">Email</th>
                            <th class="text-left px-4 py-2">Position</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr 
                                class="border-b hover:bg-gray-100 cursor-pointer"
                                onclick="window.location='<?php echo route('admin.employees.show', $employee->id); ?>'">
                                <td class="px-4 py-2">{{ $employee->name }}</td>
                                <td class="px-4 py-2">{{ $employee->email }}</td>
                                <td class="px-4 py-2">{{ $employee->position }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="text-center">
            <a href="{{ route('admin.employees.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                Add Employee
            </a>
        </div>

    </div>

</body>
</html>
