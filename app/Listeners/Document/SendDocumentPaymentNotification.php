<?php

namespace App\Listeners\Document;

use App\Events\Document\PaymentReceived as Event;
use App\Notifications\Portal\PaymentReceived as Notification;

class SendDocumentPaymentNotification
{
    /**
     * Handle the event.
     *
     * @param  $event
     * @return array
     */
    public function handle(Event $event)
    {
        $document = $event->document;
        $transaction = $document->transactions()->latest()->first();

        // Notify the customer
        if ($document->contact && !empty($document->contact_email)) {
            $document->contact->notify(new Notification($document, $transaction, "{$document->type}_payment_customer"));
        }

        // Notify all users assigned to this company
        foreach ($document->company->users as $user) {
            if (!$user->can('read-notifications')) {
                continue;
            }

            $user->notify(new Notification($document, $transaction, "{$document->type}_payment_admin"));
        }
    }
}
