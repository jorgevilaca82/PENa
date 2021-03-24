<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HipoteseLegal extends Model
{
    use HasFactory;

    protected $table = "hipotese_legal";

    protected $fillable = ['descricao'];

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->descricao;
    }
}
