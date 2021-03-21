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
                    
                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                        @forelse ($objects as $obj)
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                                <span class="ml-2 flex-1 w-0 truncate">
                                    {{ $obj->nup17 }}
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="{{ route('processo_eletronico.show', $obj) }}" 
                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                Ver
                                </a>
                            </div>
                        </li>
                        @empty
                        <p>Nenhum processo</p>
                        @endforelse    
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>