<?php

namespace App\Observers;

use App\Models\Invoice;

class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     */
    public function created(Invoice $invoice): void
    {
//        $user = \App\Models\User::query()->where('id','=',$invoice->membership_id)->first();
//        $email = 'salamtura@gmail.com';
//
//        $maildata = [
//            'title' => 'A new invoice has been created on your request.',
//            'body' => '',
//            'invoice' => $invoice,
//            'user' => $user->name,
//            'inv_no' => $invoice->inv_number,
//            //'date' => $tx->transaction_date,
//        ];

//            Mail::to($user)->send(new SendInvoice($maildata));
    }

    /**
     * Handle the Invoice "created" event.
     */
    public function creating(Invoice $invoice): void
    {
        $invoice->inv_number= $this->invoiceNumber();
    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "deleted" event.
     */
    public function deleted(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "restored" event.
     */
    public function restored(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "force deleted" event.
     */
    public function forceDeleted(Invoice $invoice): void
    {
        //
    }

    function invoiceNumber(): string
    {
        $latest = Invoice::query()->orderByDesc('id')->first();

        if (! $latest) {
            return 'INV0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->inv_number);

        return 'INV' . sprintf('%04d', (int) $string + 1 );
    }
}
