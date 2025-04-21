@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded shadow mt-10">
    <h2 class="text-2xl font-bold mb-6">Add Revenue</h2>

    <form action="{{ route('revenue.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="terminal_name" class="block text-gray-700">Terminal Name</label>
            <input type="text" name="terminal_name" id="terminal_name" required
                   class="w-full mt-2 p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label for="amount" class="block text-gray-700">Amount (₱)</label>
            <input type="number" name="amount" id="amount" required
                   class="w-full mt-2 p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700">Date</label>
            <input type="date" name="date" id="date" required
                   class="w-full mt-2 p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
        </div>

        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
            Submit
        </button>
    </form>
</div>
@endsection
