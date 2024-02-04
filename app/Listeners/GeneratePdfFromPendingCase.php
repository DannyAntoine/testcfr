<?php

namespace App\Listeners;

use App\Events\NewPendingCase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GeneratePdfFromPendingCase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewPendingCase  $event
     * @return void
     */
    public function handle(NewPendingCase $event)
    {
        $newCase = $event->newCase;

        // Dispatch the job
        dispatch(new GeneratePdfJob($newCase));
    }
}
