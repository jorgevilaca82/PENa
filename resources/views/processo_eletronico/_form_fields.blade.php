<div x-data="{ public: {{ $processoEletronico->public ? 'true' : 'false' }} }">

    <!-- Visibilidade -->
    <div class="block mt-4">
        <label for="public" class="inline-flex items-center">
            <input id="public" type="checkbox" x-model="public"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                name="public">
            <span class="ml-2 text-sm text-gray-600">{{ __('Público ?') }}</span>
        </label>
    </div>

    <!-- Hipótese legal -->
    <div x-show.transition="! public">
        <x-label for="hipotese_legal_id" :value="__('Hipótese legal')" />
        <x-select-input name="hipotese_legal_id" :selectedID="old('hipotese_legal_id')" :items="$hipotesesLegais"
            x-bind:required="! public" class="block mt-1 w-full" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-3">
            {{ __('Salvar') }}
        </x-button>
    </div>
</div>