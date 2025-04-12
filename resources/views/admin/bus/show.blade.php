<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    <div class="p-6 w-full max-w-4xl mx-auto">
    
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Bus Details</h1>

    
        <div class="bg-white p-6 rounded-xl shadow-md space-y-6">
            <div>
         
                <h2 class="text-2xl font-semibold text-gray-700">{{ $bus->bus_type }}</h2>
             
                <p class="text-lg text-gray-500 mt-2">{{ $bus->description }}</p>
            </div>


            <div class="flex flex-col sm:flex-row sm:space-x-4 sm:justify-between mt-6">

                <form action="{{ route('admin.bus.destroy', $bus->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this bus?');" class="w-full sm:w-auto">
                    @csrf
                    @method('DELETE') 
                    <button type="submit" class="w-full sm:w-auto bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                        Delete Bus
                    </button>
                </form>


                <a href="{{ route('admin.bus.index') }}" class="w-full sm:w-auto mt-4 sm:mt-0 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    Back to Bus List
                </a>
            </div>
        </div>
    </div>

</body>
</html>
