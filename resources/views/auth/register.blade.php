<link rel="icon" href="{{ asset('M3VALLE.ico') }}" type="image/x-icon">

<body class="text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col"
      style="background-image: url('images/bus3.png');
             background-size: cover;
             background-position: center;
             background-repeat: no-repeat;
             background-attachment: fixed;">

    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text"
                              class="block mt-1 w-full border-2 border-dark-red"
                              :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            {{-- Age --}}
            <div>
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" name="age" type="number"
                              class="block mt-1 w-full border-2 border-dark-red"
                              :value="old('age')" required autocomplete="age" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            {{-- Sex --}}
            <div>
                <x-input-label for="sex" :value="__('Sex')" />
                <select id="sex" name="sex" class="block mt-1 w-full border-2 border-dark-red" required>
                    <option value="" disabled selected>Select your sex</option>
                    <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('sex') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                <x-input-error :messages="$errors->get('sex')" class="mt-2" />
            </div>


            {{-- Address --}}
            <div>
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" name="address" type="text"
                              class="block mt-1 w-full border-2 border-dark-red"
                              :value="old('address')" required autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            {{-- Phone --}}
            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" name="phone" type="text"
                              class="block mt-1 w-full border-2 border-dark-red"
                              :value="old('phone')" required autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            {{-- Email --}}
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email"
                              class="block mt-1 w-full border-2 border-dark-red"
                              :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" name="password" type="password"
                              class="block mt-1 w-full border-2 border-dark-red"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Confirm Password --}}
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                              class="block mt-1 w-full border-2 border-dark-red"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="bg-red-600 text-white hover:bg-red-700 px-5 py-2 rounded-md ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

        <style>
            .border-dark-red {
                border-color: #8B0000;
            }
        </style>
    </x-guest-layout>

</body>
