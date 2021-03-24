<?php

namespace Database\Seeders;

use App\Models\UnidadeOrganizacional;
use Illuminate\Database\Seeder;

class UnidadeOrganizacionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nome' => 'MINISTÉRIO DA EDUCAÇÃO', 'cod_protocolo' => '23000', 'parent_id' => null],
            ['nome' => 'INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DE RONDÔNIA', 'cod_protocolo' => '23243', 'parent_id' => 1],
            ['nome' => 'REITORIA', 'cod_protocolo' => null, 'parent_id' => 2],
            ['nome' => 'DGTI', 'cod_protocolo' => null, 'parent_id' => 3],
            ['nome' => 'CDSIS', 'cod_protocolo' => null, 'parent_id' => 4],
        ];

        foreach ($data as $uo) {
            UnidadeOrganizacional::create($uo);
        }
    }
}
