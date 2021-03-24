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


        // TODO: obter de $request->user
        $data['org_id'] = '23243';

        $processoEletronico = ProcessoEletronico::create($data);

        $this->storage->makeDirectory($processoEletronico->id);

        // Dispara o evento
        $event = new NovoProcessoEletronicoIniciado($processoEletronico);
        broadcast($event)->toOthers();

        return $processoEletronico;
    }
}
