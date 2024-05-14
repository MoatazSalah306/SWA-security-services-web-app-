<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div style="display: flex;justify-content:center">
        <span class="text-gray-600 dark:text-gray-400 text-lg">Register to <span style="color:#3B82F6">SWA</span></span>
        </div>
        
        <div class="mt-4" style="display: flex;justify-content:space-between">
            <!-- Name -->
            <div class="mr-2">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

        </div>

        <div class="mt-4" style="display: flex;justify-content:space-between">
            <!-- Password -->
            <div class="mr-2">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"  autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <!-- Phone number -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone number')" />

            <x-text-input id="phone_number" class="block mt-1 w-full"
                            type="tel"
                            name="phone"  autocomplete="new-phonenumber" />

            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />

            <x-text-input id="address" class="block mt-1 w-full"
                            type="text"
                            name="address"  autocomplete="new-address" />

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
