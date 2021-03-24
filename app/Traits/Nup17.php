<?php

namespace App\Traits;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

/**
 * Nup17 - Número Único de Protocolo (tamanho 17)
 * 
 * @link https://www.gov.br/economia/pt-br/assuntos/processo-eletronico-nacional/conteudo/numero-unico-de-protocolo
 */
trait Nup17
{

    /**
     * Nome da coluna para nup-17
     */
    protected $nup17Column = "nup17";

    /**
     * Nome da coluna para Id do orgão
     */
    protected $orgIdColumn = "org_id";

    /**
     * Nome da coluna para sequência de protocolo
     */
    protected $protocoloSeqColumn = "protocolo_seq";

    /**
     * Boot trait
     */
    protected static function bootNup17()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getNup17Column()})) {
                $model->{$model->getNup17Column()} = $model->generateNup17();
            }
        });
    }


    /**
     * Gera o NUP-17
     * 
     * @return string
     */
    protected function generateNup17()
    {
        $currentYear = Date::now()->year;

        $this->{$this->getProtocoloSeqColumn()} = 1;

        $latest = static::whereYear($this->getCreatedAtColumn(), $currentYear)
            ->where($this->getOrgIdColumn(), $this->{$this->getOrgIdColumn()})
            ->latest()
            ->orderByDesc($this->getProtocoloSeqColumn())
            ->limit(1)
            ->get();

        if ($latest->count()) {
            $latest = $latest[0];

            $this->{$this->getProtocoloSeqColumn()} =
                (int) $latest->{$this->getProtocoloSeqColumn()} + 1;
        }

        $newSeq = Str::padLeft($this->{$this->getProtocoloSeqColumn()}, 6, '0');
        $orgId = Str::padLeft($this->{$this->getOrgIdColumn()}, 5, '0');

        $dv = $this->generateNup17DV($orgId, $newSeq, $currentYear);

        return "{$orgId}.{$newSeq}/{$currentYear}-{$dv}";
    }

    /**
     * Gera o dígito verificador para o NUP-17
     * 
     * @return string
     */
    public function generateNup17DV($orgId, $newSeq, $currentYear, $dvLength = 2)
    {
        // número do processo sem o dv
        $np = "{$orgId}{$newSeq}{$currentYear}";
        $dv = "";

        do {
            $result = collect(str_split(strrev($np . $dv)))
                ->map(function ($item, $key) {
                    return (int) $item * ((int) $key + 2);
                })->sum();
            $dv .= ((11 - ($result % 11)) % 10);
        } while (Str::length($dv) < $dvLength);

        return $dv;
    }

    /**
     * Obtem o nome da coluna no NUP-17
     * 
     * Sobrescreva esse método no seu model caso
     * deseje um nome de coluna diferente.
     * 
     * @return string
     */
    public function getNup17Column()
    {
        return $this->nup17Column;
    }

    /**
     * Obtem o nome da coluna para o ID do Órgão
     * 
     * Sobrescreva esse método no seu model caso
     * deseje um nome de coluna diferente.
     * 
     * @return string
     */
    public function getOrgIdColumn()
    {
        return $this->orgIdColumn;
    }

    /**
     * Obtem o nome da coluna para a Sequência de Protocolo
     * 
     * Sobrescreva esse método no seu model caso
     * deseje um nome de coluna diferente.
     * 
     * @return string
     */
    public function getProtocoloSeqColumn()
    {
        return $this->protocoloSeqColumn;
    }
}
