<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('M3VALLE.ico') }}" type="image/x-icon">
</head>

<body class="min-h-screen" 
      style="background-image: url('images/bus2.jpg'); 
             background-size: cover; 
             background-position: center; 
             background-repeat: no-repeat; 
             background-attachment: fixed;">

    <div class="bg-red-900 bg-opacity-90 min-h-screen px-4 py-6">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="bg-white text-black font-bold py-2 px-4 rounded shadow">
                        <p>EMPLOYEES</p>
                </div>
                <div class="text-white text-2xl">
                    <i class="fas fa-user-circle"></i>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="flex justify-center mb-6">
                <div class="w-full md:w-1/2 relative">
                    <input type="text" placeholder="Search"
                           class="w-full pl-10 pr-4 py-2 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-white">
                    <span class="absolute left-3 top-2.5 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2a7.5 7.5 0 010 15z"/>
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Employee Table -->
            @if($employees->isEmpty())
                <p class="text-center text-white">No employees found.</p>
            @else
                <div class="overflow-x-auto bg-white rounded-lg shadow p-4 mb-6">
                    <table class="w-full table-auto text-sm">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="text-left px-4 py-2">Name</th>
                                <th class="text-left px-4 py-2">Age</th>
                                <th class="text-left px-4 py-2">Sex</th>
                                <th class="text-left px-4 py-2">Address</th>
                                <th class="text-left px-4 py-2">Phone</th>
                                <th class="text-left px-4 py-2">Employee Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr class="border-b hover:bg-gray-100 cursor-pointer"
                                    onclick="window.location='{{ route('admin.employees.show', $employee->id) }}'">
                                    <td class="px-4 py-2">{{ $employee->name }}</td>
                                    <td class="px-4 py-2">{{ $employee->age }}</td>
                                    <td class="px-4 py-2">{{ $employee->sex }}</td>
                                    <td class="px-4 py-2">{{ $employee->address }}</td>
                                    <td class="px-4 py-2">{{ $employee->phone }}</td>
                                    <td class="px-4 py-2">{{ $employee->position }}</td> <!-- Assuming this holds 'Driver', 'Conductor', etc. -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
                
                <!-- Back Button -->
                <div class="text-center">
                    <a href="{{ route('adminpage') }}" 
                       class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
