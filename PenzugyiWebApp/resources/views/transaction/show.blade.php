<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tranzakció részletei') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Transaction Type Badge -->
                    <div class="mb-6">
                        @if($transaction->type === 'income')
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Bevétel
                            </span>
                        @else
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Kiadás
                            </span>
                        @endif
                    </div>

                    <!-- Transaction Details -->
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Összeg</dt>
                            <dd class="mt-1 text-2xl font-semibold {{ $transaction->type === 'income' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction->type === 'income' ? '+' : '-' }}{{ number_format($transaction->amount, 0, ',', ' ') }} Ft
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Dátum</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ \Carbon\Carbon::parse($transaction->date)->format('Y. m. d.') }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Kategória</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $transaction->category->name ?? 'N/A' }}
                            </dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Tranzakció ID</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                #{{ $transaction->id }}
                            </dd>
                        </div>

                        @if($transaction->description)
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Leírás</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $transaction->description }}
                            </dd>
                        </div>
                        @endif

                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Létrehozva</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $transaction->created_at->format('Y. m. d. H:i') }}
                            </dd>
                        </div>

                        @if($transaction->updated_at != $transaction->created_at)
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Utoljára módosítva</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $transaction->updated_at->format('Y. m. d. H:i') }}
                            </dd>
                        </div>
                        @endif
                    </dl>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex items-center justify-between border-t border-gray-200 pt-6">
                        <a href="{{ route('transactions.index') }}"
                            class="text-sm text-gray-600 hover:text-gray-900">
                            ← Vissza a listához
                        </a>
                        <div class="flex gap-3">
                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Szerkesztés
                            </a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Biztosan törölni szeretnéd ezt a tranzakciót?')"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Törlés
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
