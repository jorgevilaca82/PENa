<!-- Validation Errors -->
<x-form-validation-errors class="mb-4" :errors="$errors" />

<form action="{{ route('processo_eletronico.store') }}" method="post">
    @csrf

    <!-- Visibilidade -->
    <div class="block mt-4">
        <label for="public" class="inline-flex items-center">
            <input id="public" type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                name="remember" {{ $processoEletronico->public ? 'checked' : '' }}>
            <span class="ml-2 text-sm text-gray-600">{{ __('Público ?') }}</span>
        </label>
    </div>

    <!-- Hipótese legal -->
    <div>
        <x-label for="hipotese_legal_id" :value="__('Hipótese legal')" />

        <x-input id="hipotese_legal_id" class="block mt-1 w-full" type="text" name="hipotese_legal_id"
            :value="old('hipotese_legal_id')" required autofocus />
    </div>


    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-3">
            {{ __('Salvar') }}
        </x-button>
    </div>

</form>