<?php

namespace App\Listeners;

use App\Events\CreateNewPatientEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPatientListener
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
     * @param  CreateNewPatientEvent  $event
     * @return void
     */
    public function handle(CreateNewPatientEvent $event)
    {
        \Log::info('user Created', ['patient' => $event]);
    }
}
