<?php

namespace App\Listeners;

use App\Events\OnEventClick;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotification
{


    public function handle(OnEventClick $event)
    {
        $event->getUser()->notify(new InvoicePaid($event->getInvoice()));
    }
}
