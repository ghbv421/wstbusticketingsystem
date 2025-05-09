<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center"  style=" background-image: url('{{ asset('images/bus2.jpg') }}');">

    <div class="bg-white border-4 border-red-700 p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <div class="text-center mb-6">  
            <a class="inline-block border border-gray-800 px-4 py-2 text-lg font-semibold">
                Edit Employee
            </a>
        </div>

        <table class="w-full table-auto border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3 w-1/3">Field</th>
                    <th class="p-3">Details</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="p-3 font-medium">Name</td>
                    <td class="p-3">{{ $employees->name }}</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3 font-medium">Email</td>
                    <td class="p-3">{{ $employees->email }}</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3 font-medium">Age</td>
                    <td class="p-3">{{ $employees->age }}</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3 font-medium">Sex</td>
                    <td class="p-3">{{ $employees->sex }}</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3 font-medium">Address</td>
                    <td class="p-3">{{ $employees->address }}</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3 font-medium">Phone</td>
                    <td class="p-3">{{ $employees->phone }}</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3 font-medium">Position</td>
                    <td class="p-3">{{ $employees->position }}</td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-around mt-6">
            <form action="{{ route('admin.employees.destroy', $employees->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="border border-gray-800 bg-red-600 px-4 py-2">Delete Employee</button>
            </form>

            <a href="{{ route('admin.employees.edit', $employees->id) }}" class="border border-gray-800 bg-green-600 px-4 py-2 text-center">
                Edit Employee
            </a>

            <a href="{{ route('admin.employees.index') }}" class="border border-gray-800 bg-yellow-500 px-4 py-2 text-center">
                Back
            </a>
        </div>
    </div>

</body>
</html>
