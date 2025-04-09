<link rel="icon" href="{{ asset('M3VALLE.ico') }}" type="image/x-icon">
<body class="flex items-center justify-center min-h-screen" 
      style="background-image: url('images/bus3.png'); 
             background-size: cover; 
             background-position: center; 
             background-repeat: no-repeat;
             background-attachment: fixed;">

<x-guest-layout>
    <!-- Transparent form container with blur effect -->
    <div class="backdrop-blur-sm bg-white/10 dark:bg-gray-900/10 p-8 rounded-lg shadow-lg border border-white/20 w-full max-w-md">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    

    <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full border-2 border-dark-red" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full border-2 border-dark-red"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

        <x-primary-button class="ms-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form>

<style>
    .border-dark-red {
        border-color: #8B0000;
    }
</style>
</x-guest-layout>
