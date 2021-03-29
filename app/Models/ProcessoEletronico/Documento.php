<?php

namespace App\Models\ProcessoEletronico;

use const DIRECTORY_SEPARATOR as DS;

use App\Models\ProcessoEletronico;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * TODO:
 *  - Implementar um file hash para garantir que o arquivo salvo
 * no sistema de arquivos continua integro com o banco de dados,
 * isso vai garantir que arquivos modificados fora do sistema sejam marcados
 * como inválidos.
 */
class Documento extends Model
{
    use HasFactory;


    protected $table = "documento";

    protected $fillable = ["nome"];

    /**
     * Obtem o caminha completo do arquivo de conteúdo 
     * no sistema de arquivos.
     * 
     * @param string $extension A extensão do arquivo desejado
     * @return string
     */
    public function getFilePath($extension = ".html")
    {
        return $this->processoEletronico->id . DS . $this->protocolo . $extension;
    }

    /**
     * Obtém o contéudo do documento no sistema de arquivos.
     * 
     * @param string $storage O disco de storage onde o arquivo está armazenado
     * @param string $extension A extensão do arquivo desejado
     * @return string
     */
    public function getContents($storage = "public", $extension = ".html")
    {
        return Storage::disk($storage)->get($this->getFilePath($extension));
    }

    /**
     * Armazena o conteúdo do documento no sistema de arquivos.
     * 
     * @param string $contents Contéudo do documento
     * @param string $storage O disco de storage onde o arquivo está armazenado
     * @param string $extension A extensão do arquivo desejado
     * @return string
     */
    public function putContents($contents, $storage = "public", $extension = ".html")
    {
        return Storage::disk($storage)->put($this->getFilePath($extension), $contents);
    }

    /**
     * Relacionamento com o processo eletrônico ao qual
     * o documento pertence.
     */
    public function processoEletronico()
    {
        return $this->belongsTo(ProcessoEletronico::class, 'pe_id');
    }

    /**
     * Boot
     */
    protected static function boot()
    {
        parent::boot();

        // Protocolo identificador do documento baseado em 
        // número inteiro de timestamp
        static::creating(function ($model) {
            $model->protocolo = now()->timestamp;
        });
    }
}
