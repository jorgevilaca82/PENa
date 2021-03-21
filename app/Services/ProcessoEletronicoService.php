<?php

namespace App\Services;

use App\Events\ProcessoEletronico\NovoProcessoEletronicoIniciado;
use App\Models\ProcessoEletronico;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Storage;

class ProcessoEletronicoService
{
    protected $defaultStorageDisk;

    public function __construct($defaultStorageDisk = 'public')
    {
        $this->storage = Storage::disk($defaultStorageDisk);
    }


    /**
     * Inicia um novo processo eletrônico para o usuário solicitante
     * e dispara um evento para notificar sobre sua criação
     * 
     * @param Arrayable $request
     * @return App\Models\ProcessoEletronico
     */
    public function inicializaNovoProcessoEletronico(Arrayable $request)
    {
        $processoEletronico = ProcessoEletronico::factory()->create([
            'user' => $request->user
        ]);

        $this->storage->makeDirectory($processoEletronico->id);

        // Dispara o evento
        NovoProcessoEletronicoIniciado::dispatch($processoEletronico);

        return $processoEletronico;
    }
}
