<x-guest-layout>
   
    <div class="w-full sm:max-w-md p-6 lg:p-8 bg-white dark:bg-gray-800 shadow-2xl overflow-hidden sm:rounded-xl">
        
        
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center mb-8 tracking-tight">
            {{ __('Log In') }}
        </h2>
        
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input 
                    id="email" 
                    
                    class="block mt-1 w-full rounded-lg shadow-sm border-gray-300 bg-white text-gray-900 placeholder-gray-500 focus:border-indigo-600 focus:ring-indigo-600" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="you@example.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-6 mb-6">
                
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input 
                    id="password" 
                    class="block mt-1 w-full rounded-lg shadow-sm border-gray-300 bg-white text-gray-900 placeholder-gray-500 focus:border-indigo-600 focus:ring-indigo-600"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password" 
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-8"> 
                
                @if (Route::has('password.request'))
                    
                    <a class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                
                
                <x-primary-button class="w-1/2 justify-center py-2.5">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>