<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\MemberAccess;
use App\Models\Membership;
use App\Models\Subscription;
use App\Models\SubscriptionCategory;
use Carbon\Carbon;

class SubscriptionObserver
{
    public function creating(Subscription $subscription): void
    {
        $cat = SubscriptionCategory::query()->where('id','=',$subscription->subscription_category_id)->first();
        $subscription->amount = $cat->amount;
        $subscription->payment_status = 'pending';
    }

    public function created(Subscription $subscription): void
    {

        $membership = Membership::query()->where('id','=',$subscription->membership_id)->first();
        $membership->membership_status = 'inactive';
        $membership->save();

        Invoice::create([
            'description' => 'Subscription for ' . $subscription->year,
            'invoice_date' => Carbon::today(),
            'invoice_due_date' => Carbon::today()->addDays(30),
            'invoice_type' => 'subscription',
            'payment_mode' => 'unknown',
            'remarks' => '',
            'total_amount' => $subscription->amount,
            'status' => 'unpaid',
            'subscription_id' => $subscription->id,
            'membership_id' => $subscription->membership_id,
        ]);
    }

    /**
     * Handle the MemberAccess "updated" event.
     */
    public function updating(Subscription $subscription): void
    {
        if($subscription->payment_status == 'paid'){
            $membership = Membership::query()->where('id','=',$subscription->membership_id)->first();
            $membership->membership_status = 'active';
            $membership->save();
        }
    }
}
