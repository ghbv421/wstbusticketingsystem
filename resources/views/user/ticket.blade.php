<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Print-specific styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                font-size: 18px; /* Increase font size for print */
            }

            .ticket {
                width: 80%; /* Increase ticket width for larger print */
                margin: 0 auto;
                padding: 30px;
                box-shadow: none;
                page-break-after: always;
            }

            h1 {
                font-size: 48px; /* Larger title for print */
                color: #FF0000;
                margin-bottom: 20px;
            }

            .details {
                font-size: 24px; /* Increase font size for ticket details */
                line-height: 1.6;
                margin-bottom: 30px;
            }

            .footer {
                font-size: 22px; /* Larger footer */
                margin-top: 30px;
                text-align: center;
            }

            /* Optional: Set page size to A4 */
            @page {
                size: A4;
                margin: 0;
            }

            /* Hide browser-only content during print */
            .browser-only {
                display: none;
            }
        }

        /* Default styling for screen (before print) */
        .ticket {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 80%;
            margin: 30px auto;
        }

        h1 {
            color: #FF0000;
        }

        .details {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .footer {
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body class="bg-gray-100 p-10 flex justify-center items-center min-h-screen">

    <div class="ticket">
        <h1 class="text-3xl font-bold text-red-600 text-center mb-4">M3VALLE</h1>

        <!-- Ticket Details -->
        <div class="space-y-4 text-lg">
            <div class="flex justify-between">
                <span class="font-medium text-gray-700">From:</span>
                <span class="text-gray-600">{{ $t1name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-700">To:</span>
                <span class="text-gray-600">{{ $t2name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-700">Price:</span>
                <span class="text-gray-600">Php {{ number_format($price, 2) }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-700">Discount:</span>
                <span class="text-gray-600">Php 0.00</span> <!-- Replace with discount logic if necessary -->
            </div>
            <div class="flex justify-between font-semibold text-xl mt-4">
                <span class="text-gray-700">Total:</span>
                <span class="text-red-600">Php {{ number_format($price, 2) }}</span>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 text-center text-sm text-gray-500">
            <p>&copy; 2025 M3VALLE. All rights reserved.</p>
        </div>
    </div>

    <!-- Browser-only content -->
    <div class="browser-only mt-4 text-center">
        <a href="{{ route('conductorpage') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">OK, Return to Homepage</a>
    </div>

    <script>
        window.print(); // Automatically trigger the print dialog when the page loads
    </script>
</body>
</html>
