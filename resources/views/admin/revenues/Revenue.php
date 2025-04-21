<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Revenue Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Bus Revenue Dashboard</h1>
            <p class="text-gray-600">Track and analyze your bus revenue performance</p>
        </header>

        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Revenue Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 font-medium">Total Revenue</p>
                        <h2 class="text-3xl font-bold text-gray-800 mt-2">$24,568</h2>
                        <p class="text-green-500 text-sm mt-1">
                            <i class="fas fa-arrow-up mr-1"></i> 12.5% from last month
                        </p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-dollar-sign text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Number of Trips Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 font-medium">Number of Trips</p>
                        <h2 class="text-3xl font-bold text-gray-800 mt-2">186</h2>
                        <p class="text-green-500 text-sm mt-1">
                            <i class="fas fa-arrow-up mr-1"></i> 8.2% from last month
                        </p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-bus text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Average Revenue per Trip -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 font-medium">Avg. Revenue/Trip</p>
                        <h2 class="text-3xl font-bold text-gray-800 mt-2">$132.08</h2>
                        <p class="text-green-500 text-sm mt-1">
                            <i class="fas fa-arrow-up mr-1"></i> 4.0% from last month
                        </p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-chart-line text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Tables Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Annual Revenue Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">Annual Bus Revenue</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trips</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Revenue (USD)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avg. Passengers</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avg. Revenue</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1,842</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$243,568</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">42.5</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$132.23</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2022</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1,654</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$213,742</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">39.8</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$129.23</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2021</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1,423</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$183,567</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">36.2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$128.99</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Monthly Revenue Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">Monthly Revenue</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Month</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trips</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Revenue (USD)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avg. Passengers</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">June 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">186</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$24,568</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">43.2</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">May 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">172</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$22,843</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">41.5</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">April 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">165</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$21,456</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">40.8</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Data Collection Section -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Data Collection</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Revenue by Route</h3>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-blue-800 font-medium">Top Performing Route</p>
                        <p class="text-gray-700">Downtown Express</p>
                        <p class="text-2xl font-bold text-blue-600 mt-2">$8,245</p>
                        <p class="text-sm text-gray-500">June 2023 revenue</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Fleet Performance</h3>
                    <div class="bg-green-50 p-4 rounded-lg">
                        <p class="text-green-800 font-medium">Best Performing Bus</p>
                        <p class="text-gray-700">Bus #42 (Hybrid Model)</p>
                        <p class="text-2xl font-bold text-green-600 mt-2">$6,892</p>
                        <p class="text-sm text-gray-500">June 2023 revenue</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Revenue Form -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Revenue Record</h2>
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="bus-number" class="block text-sm font-medium text-gray-700">Bus Number</label>
                        <input type="text" id="bus-number" name="bus-number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                    </div>
                    <div>
                        <label for="route" class="block text-sm font-medium text-gray-700">Route</label>
                        <input type="text" id="route" name="route" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="date" name="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                    </div>
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">Amount (USD)</label>
                        <input type="number" step="0.01" id="amount" name="amount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                    </div>
                    <div>
                        <label for="passengers" class="block text-sm font-medium text-gray-700">Passenger Count</label>
                        <input type="number" id="passengers" name="passengers" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                    </div>
                </div>
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                    <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-plus mr-2"></i> Add Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
