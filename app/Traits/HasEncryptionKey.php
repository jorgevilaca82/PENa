<?php

namespace App\Traits;

use Illuminate\Encryption\Encrypter;

trait HasEncryptionKey
{
    protected $encryptionKeyName = "encryption_key";

    public function getEncryptionKeyColumn()
    {
        return $this->encryptionKeyName;
    }

    /**
     * Generate a random key for the application.
     *
     * @return string
     */
    protected function generateRandomKey()
    {
        return 'base64:' . base64_encode(
            Encrypter::generateKey(app()->config['app.cipher'])
        );
    }

    public function bootHasEncryptionKey()
    {
        static::creating(function ($model) {
            $model->{$this->getEncryptionKeyColumn()} = $model->generateRandomKey();
        });
    }
}
