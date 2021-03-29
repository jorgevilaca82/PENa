<?php

namespace App\Http\Controllers\ProcessoEletronico;

use App\Http\Controllers\Controller;
use App\Models\ProcessoEletronico;
use App\Models\ProcessoEletronico\Documento;
use App\Services\ProcessoEletronicoService;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function __construct(ProcessoEletronicoService $service)
    {
        $this->service = $service;
    }

    /**
     * Exibe informações básicas do processo e a lista
     * de documentos que o compõem.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProcessoEletronico $processoEletronico)
    {
        return view(
            "processo_eletronico.documento.index",
            compact("processoEletronico")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProcessoEletronico $processoEletronico)
    {
        return view(
            "processo_eletronico.documento.create",
            compact("processoEletronico")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        ProcessoEletronico $processoEletronico
    ) {
        $documento = $this->service
            ->adicionaNovoDocumentoAoProcesso($processoEletronico, $request);

        return redirect()
            ->route(
                "processo_eletronico.documentos.edit",
                [$processoEletronico, $documento]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessoEletronico\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(
        ProcessoEletronico $processoEletronico,
        Documento $documento
    ) {
        dd($documento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessoEletronico\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(
        ProcessoEletronico $processoEletronico,
        Documento $documento
    ) {
        return view(
            "processo_eletronico.documento.edit",
            compact('processoEletronico', "documento")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessoEletronico\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        ProcessoEletronico $_,
        Documento $documento
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessoEletronico\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcessoEletronico $_, Documento $documento)
    {
        //
    }
}
