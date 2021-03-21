<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessoEletronico\StoreRequest;
use App\Models\ProcessoEletronico;
use App\Services\ProcessoEletronicoService;
use Illuminate\Http\Request;

class ProcessoEletronicoController extends Controller
{

    public function __construct(ProcessoEletronicoService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = ProcessoEletronico::latest()->get();
        return view("processo_eletronico.index", compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProcessoEletronico\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $processoEletronico = $this->service
            ->inicializaNovoProcessoEletronico($request);

        return redirect()
            ->route('processo_eletronico.show', $processoEletronico);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessoEletronico  $processoEletronico
     * @return \Illuminate\Http\Response
     */
    public function show(ProcessoEletronico $processoEletronico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessoEletronico  $processoEletronico
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcessoEletronico $processoEletronico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessoEletronico  $processoEletronico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcessoEletronico $processoEletronico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessoEletronico  $processoEletronico
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcessoEletronico $processoEletronico)
    {
        //
    }
}
