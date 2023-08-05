<?php

namespace App\Providers;

use App\Mail\SendInvoice;
use App\Nova\Payment;
use App\Nova\PlayerHandicap;
use App\Nova\PostCategory;
use App\Nova\Chukker;
use App\Nova\ChukkerBooking;
use App\Nova\Document;
use App\Nova\DocumentCategory;
use App\Nova\PenaltyCharge;
use App\Nova\Invoice;
use App\Nova\MemberAccess;
use App\Nova\Membership;
use App\Nova\MembershipCategory;
use App\Nova\Occupation;
use App\Nova\Penalty;
use App\Nova\Pitch;
use App\Nova\Post;
use App\Nova\Profession;
use App\Nova\Stable;
use App\Nova\StableCharge;
use App\Nova\Subscription;
use App\Nova\SubscriptionCategory;
use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Laravel\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Pktharindu\NovaPermissions\Nova\Role;
use SimonHamp\LaravelNovaCsvImport\LaravelNovaCsvImport;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::withBreadcrumbs();

        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('chart-bar'),

                MenuSection::make('Activities', [
                    MenuItem::resource(Pitch::class)
                        ->name('Pitch Status'),
                    MenuItem::resource(Chukker::class)
                        ->name('Chukkers'),
                    MenuItem::resource(PlayerHandicap::class)
                        ->name('Player Handicaps'),
                    MenuItem::resource(Post::class)
                        ->name('Posts'),
                    MenuItem::resource(Document::class)
                        ->name('Documents'),
                ])->icon('play')->collapsable(),

                MenuSection::make('Accounts', [
                    MenuItem::resource(User::class),
                    MenuItem::resource(Role::class),
                    MenuItem::resource(MemberAccess::class)
                        ->name('Member Access'),
                ])->icon('user')->collapsable(),

                MenuSection::make('Membership', [
                    MenuItem::resource(Membership::class),
                    MenuItem::resource(Stable::class),
                    MenuItem::resource(Subscription::class),
                    MenuItem::resource(Penalty::class),
                ])->icon('user-group')->collapsable(),

                MenuSection::make(' Club Charges', [
                    MenuItem::resource(Invoice::class)
                        ->name('Invoices'),
                    MenuItem::resource(Payment::class)
                        ->name('Payments'),
                    MenuItem::resource(MembershipCategory::class)
                        ->name('Membership Charges'),
                    MenuItem::resource(SubscriptionCategory::class)
                        ->name('Subscription Charges'),
                    MenuItem::resource(StableCharge::class)
                        ->name('Stable Charges'),
                    MenuItem::resource(PenaltyCharge::class)
                        ->name('Penalty Charges'),
                ])->icon('cash')->collapsable(),

                MenuSection::make('Reports', [

                ])->icon('document-text')->collapsable(),

                MenuSection::make('Administration', [
                    MenuItem::resource(Occupation::class),
                    MenuItem::resource(Profession::class),
                    MenuItem::resource(PostCategory::class),
                    MenuItem::resource(DocumentCategory::class),
                ])->icon('puzzle')->collapsable(),
            ];
        });

    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->is_admin;
//            return in_array($user->email, [
//                //
//            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \Pktharindu\NovaPermissions\NovaPermissions(),
            new LaravelNovaCsvImport,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
