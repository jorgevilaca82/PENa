<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UnidadeOrganizacional extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "unidade_organizacional";

    protected $fillable = ['nome', 'cod_protocolo', 'parent_id'];

    /**
     * Unidade Organizacional superior (Pai)
     *
     * @return type
     **/
    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    /**
     * Obtem o código de protocolo da primeira unidade pai
     * com código de protocolo não nulo
     * 
     * @return string
     */
    protected function _getCodProtocoloUnidadePai()
    {
        $query = <<<SQL
            WITH RECURSIVE Ancestors AS
            (
                SELECT 
                    cod_protocolo, 
                    id, 
                    parent_id, 
                    0 AS LEVEL 
                FROM 
                    unidade_organizacional 
                WHERE
                    id = ?
                    
                UNION all
                
                SELECT 
                    child.cod_protocolo, 
                    child.id, 
                    child.parent_id, 
                    level+1 
                FROM 
                    unidade_organizacional child 
                INNER join
                    Ancestors p ON child .id = p.parent_id
            )
            SELECT cod_protocolo 
            FROM Ancestors 
            WHERE cod_protocolo IS NOT NULL
            ORDER BY LEVEL ASC
            LIMIT 1
SQL;

        $value = Cache::remember(
            "cod-protocolo-{$this->id}",
            now()->addYear(1),
            function () use ($query) {
                $result = DB::select($query, [$this->id]);
                return $result[0]->cod_protocolo;;
            }
        );

        return $value;
    }

    /**
     * 
     */
    public function getCodProtocoloAttribute($value)
    {
        if (!$value) {
            return $this->_getCodProtocoloUnidadePai();
        }

        return $value;
    }
}
