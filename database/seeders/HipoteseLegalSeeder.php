<?php

namespace Database\Seeders;

use App\Models\HipoteseLegal;
use Illuminate\Database\Seeder;

class HipoteseLegalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hipoteses = [
            ["descricao" => "Controle Interno (Art. 26, § 3º, da Lei nº 10.180/2001)"],
            ["descricao" => "Documento Preparatório (Art. 7º, § 3º, da Lei nº 12.527/2011)"],
            ["descricao" => "Informação Pessoal (Art. 31 da Lei nº 12.527/2011)"],
            ["descricao" => "Informação Restrita (Geral) (Art. 22, da Lei nº 12.527/2011)"],
            ["descricao" => "Investigação de Responsabilidade de Servidor (Art. 150 da Lei nº 8.112/1990)"],
            ["descricao" => "Protocolo - Pendente Análise de Restrição de Acesso (Art. 6º, III, da Lei nº 12.527/2011)"],
            ["descricao" => "Sigilo Contábil (Art. 1.190 da Lei nº 10.406/2002)"],
            ["descricao" => "Sigilo Empresarial (Art. 169 da Lei nº 11.101/2005)"],
            ["descricao" => "Sigilo Fiscal (Art. 198, caput, da Lei nº 5.172/1966)"],
        ];

        collect($hipoteses)->each(function ($hipotese) {
            HipoteseLegal::create($hipotese);
        });
    }
}
