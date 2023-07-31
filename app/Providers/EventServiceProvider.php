<?php

namespace App\Providers;

use App\Listeners\UserLoginAt;
use App\Models\Chukker;
use App\Models\ChukkerBooking;
use App\Models\Document;
use App\Models\Invoice;
use App\Models\MemberAccess;
use App\Models\Membership;
use App\Models\Penalty;
use App\Models\PenaltyCharge;
use App\Models\Pitch;
use App\Models\Post;
use App\Models\Stable;
use App\Models\StableCharge;
use App\Models\Subscription;
use App\Observers\ChukkerBookingObserver;
use App\Observers\ChukkerObserver;
use App\Observers\DocumentObserver;
use App\Observers\InvoiceObserver;
use App\Observers\MemberAccessObserver;
use App\Observers\MembershipObserver;
use App\Observers\PenaltyChargeObserver;
use App\Observers\PenaltyObserver;
use App\Observers\PitchObserver;
use App\Observers\PostObserver;
use App\Observers\StableChargeObserver;
use App\Observers\StableObserver;
use App\Observers\SubscriptionObserver;
use Illuminate\Auth\Events\Login;
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
        ChukkerBooking::class => [ChukkerBookingObserver::class],
        Chukker::class => [ChukkerObserver::class],
        Post::class => [PostObserver::class],
        Document::class => [DocumentObserver::class],
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
        Login::class => [
            UserLoginAt::class,
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
