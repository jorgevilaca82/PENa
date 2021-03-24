<?php

namespace App\Services;

use App\Events\ProcessoEletronico\NovoProcessoEletronicoIniciado;
use App\Models\ProcessoEletronico;
use Illuminate\Foundation\Http\FormRequest;
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
     * @param FormRequest $request
     * @return App\Models\ProcessoEletronico
     */
    public function inicializaNovoProcessoEletronico($request)
    {
        $data = $request->input();

        $data['org_id'] = $request->user()->unidadeOrganizacional->cod_protocolo;

        $processoEletronico = ProcessoEletronico::create($data);

        $this->storage->makeDirectory($processoEletronico->id);

        // Dispara o evento
        $event = new NovoProcessoEletronicoIniciado($processoEletronico);
        broadcast($event)->toOthers();

        return $processoEletronico;
    }
}
