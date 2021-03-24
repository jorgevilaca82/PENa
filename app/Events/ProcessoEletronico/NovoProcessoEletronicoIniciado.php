<?php

namespace App\Events\ProcessoEletronico;

use App\Models\ProcessoEletronico;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NovoProcessoEletronicoIniciado implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The ProcessoEletronico instance.
     *
     * @var \App\Models\ProcessoEletronico
     */
    public $processoEletronico;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ProcessoEletronico $processoEletronico)
    {
        $this->processoEletronico = $processoEletronico;
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'processoEletronico.iniciado';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("processoEletronico.{$this->processoEletronico->org_id}");
    }
}
