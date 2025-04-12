<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    <div class="p-6 w-full max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-700">Bus List</h1>

        <div class="flex justify-center">
            <div class="flex space-x-6 overflow-x-auto pb-4">
                @foreach ($Buses as $Bus)
                    <!-- Make each bus card clickable -->
                    <a href="{{ route('admin.bus.show', $Bus->id) }}" class="min-w-[200px] bg-white rounded-xl shadow p-4 flex-shrink-0 block">
                        <p class="text-lg font-semibold text-gray-700">{{ $Bus->bus_type }}</p>
                        <p class="text-sm text-gray-500 mt-2">{{ $Bus->description }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex justify-start mt-6">
            <a href="{{ route('admin.bus.register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                Add Bus
            </a>
        </div>
    </div>

</body>
</html>
