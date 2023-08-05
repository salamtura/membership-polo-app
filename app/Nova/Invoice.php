<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Invoice extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Invoice>
     */
    public static $model = \App\Models\Invoice::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'inv_number';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'inv_number','membership.surname','membership.firstname'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
//            ID::make()->sortable(),
            Text::make('Invoice Number','inv_number')
                ->readonly()
                ->hideWhenCreating()
                ->sortable(),
            Text::make('description')
                ->required(),
            Date::make('Invoice Date')
                ->required(),
            Date::make('Invoice Due Date')
                ->required(),
            Select::make('Invoice Type')
                ->readonly()
                ->options([
                    'subscription' => 'Subscription',
                    'stable' => 'Stable',
                    'penalty' => 'Penalty',
                    'other' => 'Other Fees',
                ])
                ->required(),
            Text::make('Payment Reference','payment_ref')
                ->onlyOnDetail()
                ->required(),
            Select::make('Payment Mode')
                ->hideFromIndex()
                ->options([
                    'unknown' => 'Unknown',
                    'transfer' => 'Bank Transfer',
                    'online' => 'Online',
                ])
                ->required(),
            Text::make('Remarks')
                ->hideFromIndex(),
            Currency::make('Total Amount')
                ->readonly()
                ->sortable()
                ->currency('NGN')
                ->required(),
            Select::make('Payment Status','status')
                ->options([
                    'unpaid' => 'Unpaid',
                    'paid' => 'Paid',
                ])
                ->onlyOnForms()
                ->required(),
            Badge::make('Payment Status','status')
                ->filterable()
                ->map([
                    'unpaid' => 'danger',
                    'paid' => 'success',
                ]),
            BelongsTo::make('Subscription')
                ->readonly()
                ->hideFromIndex()
                ->nullable(),
            BelongsTo::make('Stable')
                ->readonly()
                ->hideFromIndex()
                ->nullable(),
            BelongsTo::make('Penalty')
                ->readonly()
                ->hideFromIndex()
                ->nullable(),
            BelongsTo::make('Membership')
                ->readonly()
                ->required(),

            HasMany::make('Payment')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
