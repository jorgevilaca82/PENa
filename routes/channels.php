<?php

use App\Models\ProcessoEletronico;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast apenas para os usuários pertencentes 
// a mesma unidade protocolizadora
Broadcast::channel(
    'processoEletronico.{uoCodProtocolo}',
    function ($user, $uoCodProtocolo) {
        return $user->unidadeOrganizacional->cod_protocolo === $uoCodProtocolo;
    }
);
