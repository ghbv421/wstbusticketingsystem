@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h2 class="text-2xl font-bold mb-6">Revenue Overview</h2>

    <canvas id="revenueChart" class="mb-8"></canvas>

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Terminal</th>
                <th class="p-2">Amount (₱)</th>
                <th class="p-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($revenues as $revenue)
            <tr class="border-t">
                <td class="p-2">{{ $revenue->terminal_name }}</td>
                <td class="p-2">₱{{ number_format($revenue->amount, 2) }}</td>
                <td class="p-2">{{ $revenue->date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
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
                        callback: function(value) {
                            return '₱' + value;
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
