<form action="{{ route('processo_eletronico.documentos.store', $processoEletronico) }}" method="post">
    @csrf

    <div class="mt-4">
        <x-label for="nome" :value="__('Nome para o documento')" />

        <x-input id="nome" class="block mt-1 w-full" type="nome" name="nome" :value="old('nome')" required autofocus />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-3">
            {{ __('Salvar') }}
        </x-button>
    </div>

</form>