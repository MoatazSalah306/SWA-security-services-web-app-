<x-guest-layout>
    <form method="POST" action={{ route('jobs.store') }}>
        @csrf


        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="body" :value="__('Job Description')" />

            <textarea id="body" class="block mt-1 w-full bg-transparent text-white"
                            
                            name="description"  autocomplete="new-body"></textarea>

            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        
        <input type="hidden" name="service_id" value={{$service_id}}>

    
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('services.index') }}">
                {{ __('Cancel ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Request') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>