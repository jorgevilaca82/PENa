<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
