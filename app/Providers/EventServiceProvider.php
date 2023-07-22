<?php

namespace App\Providers;

use App\Models\Invoice;
use App\Models\MemberAccess;
use App\Models\Membership;
use App\Models\Penalty;
use App\Models\PenaltyCharge;
use App\Models\Pitch;
use App\Models\Stable;
use App\Models\StableCharge;
use App\Models\Subscription;
use App\Observers\InvoiceObserver;
use App\Observers\MemberAccessObserver;
use App\Observers\MembershipObserver;
use App\Observers\PenaltyChargeObserver;
use App\Observers\PenaltyObserver;
use App\Observers\PitchObserver;
use App\Observers\StableChargeObserver;
use App\Observers\StableObserver;
use App\Observers\SubscriptionObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        MemberAccess::class => [MemberAccessObserver::class],
        Membership::class => [MembershipObserver::class],
        Stable::class => [StableObserver::class],
        Subscription::class => [SubscriptionObserver::class],
        Invoice::class => [InvoiceObserver::class],
        StableCharge::class => [StableChargeObserver::class],
        Penalty::class => [PenaltyObserver::class],
        PenaltyCharge::class => [PenaltyChargeObserver::class],
        Pitch::class => [PitchObserver::class],

    ];

    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
