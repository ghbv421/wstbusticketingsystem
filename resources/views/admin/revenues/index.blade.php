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
            const revenues = @json($revenues);
            const drivers = @json($drivers);
            const conductors = @json($conductors);

            const labels = revenues.map(r => {
                const driverName = drivers[r.driver_id] ?? 'Unknown Driver';
                const conductorName = conductors[r.conductor_id] ?? 'Unknown Conductor';
                return `Bus ${r.bus_id} - Driver: ${driverName} - Conductor: ${conductorName}`;
            });

            const data = revenues.map(r => r.total_amount);

            const ctx = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Revenue (₱)',
                        data: data,
                        backgroundColor: 'rgba(239, 68, 68, 0.6)',
                        borderColor: 'rgba(220, 38, 38, 1)',
                        borderWidth: 1,
                        borderRadius: 6,
                        hoverBackgroundColor: 'rgba(220, 38, 38, 0.8)'
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                color: '#1f2937',
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#4b5563',
                                callback: value => '₱' + value
                            },
                            grid: {
                                color: '#e5e7eb'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#4b5563'
                            },
                            grid: {
                                color: '#f3f4f6'
                            }
                        }
                    }
                }
            });
        };
    </script>

</head>

<body class="bg-gray-100 font-sans antialiased leading-relaxed">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 tracking-tight">📊 Revenue Overview</h1>
        </div>

        <!-- Chart -->
        <div class="bg-white p-6 rounded-2xl shadow-lg mb-10">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Monthly Revenue Chart</h2>
            <canvas id="revenueChart" class="w-full h-96"></canvas>
        </div>

        <!-- Table -->
        <div class="bg-white p-6 rounded-2xl shadow-lg overflow-auto">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Revenue List</h2>
            <table class="w-full table-auto border-collapse text-sm">
                <thead class="bg-red-100 text-red-700 uppercase">
                    <tr>
                        <th class="p-3 text-left font-bold">Bus ID</th>
                        <th class="p-3 text-left font-bold">Driver</th>
                        <th class="p-3 text-left font-bold">Conductor</th>
                        <th class="p-3 text-left font-bold">Amount (₱)</th>
                        <th class="p-3 text-left font-bold">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($revenues as $revenue)
                        <tr class="border-t border-gray-200 hover:bg-red-50 transition">
                            <td class="p-3 text-gray-700">{{ $revenue->bus_id }}</td>
                            <td class="p-3 text-gray-700">{{ $drivers[$revenue->driver_id] ?? 'N/A' }}</td>
                            <td class="p-3 text-gray-700">{{ $conductors[$revenue->conductor_id] ?? 'N/A' }}</td>
                            <td class="p-3 text-gray-700 font-semibold">₱{{ number_format($revenue->total_amount, 2) }}</td>
                            <td class="p-3 text-gray-700">{{ \Carbon\Carbon::parse($revenue->latest_date)->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4 text-gray-500">No revenue records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Back Button -->
        <div class="mt-8 flex justify-center">
            <a href="{{ route('adminpage') }}"
               class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition shadow-lg">
                ⬅ Back to Admin Page
            </a>
        </div>
    </div>
</body>
</html>
