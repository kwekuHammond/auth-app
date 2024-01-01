<?php

namespace App\Listeners;

use App\Events\WebSocketTestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WebSocketTestListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebSocketTestEvent $event): void
    {
        //
    }
}
