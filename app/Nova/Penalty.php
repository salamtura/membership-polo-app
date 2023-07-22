<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Penalty extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Penalty>
     */
    public static $model = \App\Models\Penalty::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'penaltycharge.name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
            BelongsTo::make('Membership')
                ->required(),
            BelongsTo::make('Penalty Charge')
                ->required(),
            Date::make('Penalty Date')
                ->sortable()
                ->required(),
            Trix::make('Remarks')
                ->required()
                ->sortable(),
            Currency::make('Amount')
                ->currency('NGN')
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->required()
                ->sortable(),
            Select::make('Status')
                ->options([
                    'pending' => 'Pending',
                    'served' => 'Served',
                ])
                ->hideWhenCreating()
                ->required(),
            BelongsTo::make('User')
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Date::make('Updated At')
                ->onlyOnDetail(),
            Date::make('Created At')
                ->onlyOnDetail(),

            HasMany::make('Invoice'),
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
