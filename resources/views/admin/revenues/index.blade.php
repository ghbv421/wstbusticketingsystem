<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Overview</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        window.onload = function () {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($revenues->pluck('terminal_name')) !!},
                    datasets: [{
                        label: 'Revenue (₱)',
                        data: {!! json_encode($revenues->pluck('amount')) !!},
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return '₱' + value;
                                }
                            }
                        }
                    }
                }
            });
        };
    </script>

</head>

<body class="bg-gray-50 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Title Section -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-semibold text-gray-800">Revenue Overview</h2>

            <!-- Add Revenue Button -->
            <a href="{{route('revenue.create')}}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                Add Revenue
            </a>
        </div>

        <!-- Revenue Chart -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <canvas id="revenueChart" class="w-full h-96"></canvas>
        </div>

        <!-- Revenue Table -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-indigo-100">
                    <tr>
                        <th class="p-3 text-left text-sm font-medium text-gray-700">Terminal</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-700">Amount (₱)</th>
                        <th class="p-3 text-left text-sm font-medium text-gray-700">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($revenues as $revenue)
                    <tr class="border-t hover:bg-indigo-50 transition duration-200">
                        <td class="p-3 text-sm text-gray-700">{{ $revenue->terminal_name }}</td>
                        <td class="p-3 text-sm text-gray-700">₱{{ number_format($revenue->amount, 2) }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $revenue->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Action Buttons Section -->
        <div class="flex justify-center gap-4">
            <!-- Back Button -->
            <a href="{{ route('adminpage') }}" 
               class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300">
                Back
            </a>
        </div>
    </div>
</body>

</html>
