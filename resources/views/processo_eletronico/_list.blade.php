<ul x-data="{}" class="border border-gray-200 rounded-md divide-y divide-gray-200">
    <template x-for="pe in $store.processos.all" :key="pe.id">
        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                <span class="ml-2 flex-1 w-0 truncate" x-text="pe.nup17"></span>
            </div>
            <div class="ml-4 flex-shrink-0">
                <a x-bind:href="`processo_eletronico/${pe.id}`"
                    class="font-medium text-indigo-600 hover:text-indigo-500">
                    Ver
                </a>
            </div>
        </li>
    </template>

    @forelse ($objects as $obj)
    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
        <div class="w-0 flex-1 flex items-center">
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
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