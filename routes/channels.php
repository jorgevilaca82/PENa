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

Broadcast::channel('processoEletronico.{orgId}', function ($user) {
    return true; // TODO: return $user->org_id === $orgId;
});

Broadcast::channel(
    'processoEletronico.{processoEletronico}',
    function (User $user, ProcessoEletronico $processoEletronico) {
        // TODO: Broadcast apenas para os usuários pertencentes ao mesmo $org_id
        return true;
    }
);
