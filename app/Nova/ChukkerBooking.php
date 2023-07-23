<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class ChukkerBooking extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ChukkerBooking>
     */
    public static $model = \App\Models\ChukkerBooking::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'membership.surname';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'membership.surname','membership.first_name'
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
            ID::make()->sortable(),
            BelongsTo::make('Membership'),
            Number::make('Chukker Number')
                ->sortable()
                ->required(),
            Number::make('Mounts')
                ->sortable()
                ->required(),
            Select::make('Preference')->options([
                'morning' => 'Morning',
                'evening' => 'Evening',
            ])->sortable(),
            Select::make('Status')->options([
                'booked' => 'Booked',
                'confirmed' => 'Confirmed',
                'rejected' => 'Rejected',
                'cancelled' => 'Cancelled',
            ])->onlyOnForms(),
            Badge::make('Status')->map([
                'booked' => 'warning',
                'confirmed' => 'success',
                'rejected' => 'danger',
                'cancelled' => 'info',
            ])->sortable(),
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
