<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Processos Da Sua Unidade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="pb-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ __('Processos mais recentes') }}
                        </h3>
                    </div>
                    <a href="{{ route('processo_eletronico.create') }}" class="">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="text-yellow-400 mr-3 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        {{ __('Novo Processo Eletrônico') }}
                    </a>

                    @include('processo_eletronico._list')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>