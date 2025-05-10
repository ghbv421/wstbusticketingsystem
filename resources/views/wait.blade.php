{{-- resources/views/auth/wait.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Pending Approval</title>
    @vite('resources/css/app.css') {{-- Tailwind via Vite --}}
    <style>
        body {
            background-image: url('{{ asset('images/warningbanner.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">
    <div class="bg-white bg-opacity-90 shadow-lg rounded-xl p-8 max-w-md w-full text-center border border-yellow-300 flex flex-col items-center">
        
        {{-- Custom Image --}}
        <img src="{{ asset('images/caution.png') }}" alt="Caution Icon" class="w-20 h-20 mb-5">

        {{-- Banner Heading --}}
        <h1 class="text-2xl font-bold text-yellow-600 mb-3">Waiting for Approval</h1>

        {{-- Description --}}
        <p class="text-base text-gray-600 mb-6 leading-relaxed">
            Your account is currently under review by an administrator.<br>
        </p>

        {{-- Logout Button --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-black font-medium py-2 px-4 rounded transition duration-200">
                Logout
            </button>
        </form>
    </div>
</body>
</html>
