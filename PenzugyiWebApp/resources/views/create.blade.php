<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Új tranzakció hozzáadása
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('transactions.store') }}">
                        @csrf

                        {{-- Számla --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Számla</label>
                            <select name="account_id" class="mt-1 block w-full border-gray-300 rounded-md">
                                @foreach($accounts as $acc)
                                    <option value="{{ $acc->account_id }}">{{ $acc->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kategória --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Kategória</label>
                            <select name="category_id" class="mt-1 block w-full border-gray-300 rounded-md">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->category_id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Típus --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Típus</label>
                            <select name="type" class="mt-1 block w-full border-gray-300 rounded-md">
                                <option value="income">Bevétel</option>
                                <option value="expense">Kiadás</option>
                                <option value="transfer">Átutalás</option>
                            </select>
                        </div>

                        {{-- Összeg --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Összeg</label>
                            <input type="number" step="0.01" name="amount"
                                   class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        {{-- Megjegyzés --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Megjegyzés</label>
                            <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                        </div>

                        {{-- Dátum --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Dátum</label>
                            <input type="date" name="date"
                                   class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        {{-- Gomb --}}
                        <div class="mt-6">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Mentés
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
