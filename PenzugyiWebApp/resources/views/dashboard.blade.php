<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('transactions.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                + Új tranzakció
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Üdvözöllek a Pénzügyi Alkalmazásban!</h3>
                        <p class="mt-2 text-sm text-gray-600">Sikeres bejelentkezés. Kezdj el tranzakciókat kezelni.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <a href="{{ route('transactions.index') }}" 
                            class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition-colors duration-150">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-900">Tranzakciók megtekintése</h4>
                                    <p class="text-sm text-gray-600">Összes tranzakció listázása</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('transactions.create') }}" 
                            class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition-colors duration-150">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-900">Új tranzakció</h4>
                                    <p class="text-sm text-gray-600">Bevétel vagy kiadás hozzáadása</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
