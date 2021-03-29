<?php

namespace App\Models;

use App\Models\ProcessoEletronico\Documento;
use App\Traits\Nup17;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessoEletronico extends Model
{
    use HasFactory, Uuids, Nup17;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "processo_eletronico";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['org_id', 'public', 'hipotese_legal_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'public' => 'boolean',
    ];

    public function hipoteseLegal()
    {
        return $this->belongsTo(HipoteseLegal::class, 'hipotese_legal_id');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'pe_id');
    }
}
