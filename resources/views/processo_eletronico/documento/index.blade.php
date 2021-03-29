<h2>
    {{ $processoEletronico->nup17 }}
</h2>

<ul>
    @foreach ($processoEletronico->documentos as $doc)
    <li>
        {{ $doc->nome }}
    </li>
    @endforeach
</ul>

<a href="{{ route('processo_eletronico.documentos.create', $processoEletronico) }}">
    Adicionar novo documento ao processo
</a>