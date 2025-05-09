<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Terminal</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background: url('{{ asset('images/bus2.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
    </style>
</head>
<body class="bg-black/60">

    <!-- Form Container with Background -->
    <div class="bg-white backdrop-blur-md rounded-2xl shadow-2xl max-w-lg mx-auto p-6">
        <h1 class="text-3xl font-bold text-center pt-8 px-6"></h1>

        <form action="{{ route('terminals.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="terminal" class="block font-semibold mb-1">Terminal</label>
                <input type="text" id="terminal" name="terminal" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="capacity" class="block font-semibold mb-1">Capacity</label>
                <input type="number" id="capacity" name="capacity" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="contact" class="block font-semibold mb-1">Contact</label>
                <input type="text" id="contact" name="contact" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="latitude" class="block font-semibold mb-1">Latitude</label>
                <input type="number" step="any" id="latitude" name="latitude" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="longitude" class="block font-semibold mb-1">Longitude</label>
                <input type="number" step="any" id="longitude" name="longitude" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="address" class="block font-semibold mb-1">Address</label>
                <input type="text" id="address" name="address" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="city" class="block font-semibold mb-1">City</label>
                <input type="text" id="city" name="city" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="state" class="block font-semibold mb-1">State</label>
                <input type="text" id="state" name="state" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div>
                <label for="country" class="block font-semibold mb-1">Country</label>
                <input type="text" id="country" name="country" class="w-full px-4 py-1 border rounded-lg" required>
            </div>

            <div class="flex justify-between items-center pt-6">
                <a href="{{ route('terminal.index') }}" class="text-red-600 hover:underline">← Back</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black px-6 py-2 rounded-lg">
                    Save
                </button>
            </div>
        </form>
    </div>

</body>
</html>
