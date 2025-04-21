<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Revenue</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Add Revenue</h2>

        <form action="{{ route('revenue.store') }}" method="POST">
            @csrf

            <!-- Terminal Name -->
            <div class="mb-6">
                <label for="terminal_name" class="block text-sm font-medium text-gray-700">Terminal Name</label>
                <input type="text" name="terminal_name" id="terminal_name" required
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Amount -->
            <div class="mb-6">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount (₱)</label>
                <input type="number" name="amount" id="amount" required
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Date -->
            <div class="mb-6">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" required
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 transition duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Submit
            </button>
        </form>
    </div>
</body>

</html>
