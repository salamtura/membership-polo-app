<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Stable extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Stable>
     */
    public static $model = \App\Models\Stable::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
            (new Panel('Stable Details',[
                ID::make()->sortable(),
                BelongsTo::make('Membership')->sortable(),
                Text::make('Description')->required(),
                Number::make('Number of Boxes')->required()->sortable(),
                Number::make('Number of Stores')->required()->sortable(),
                Number::make('Number of Lounges')->required()->sortable(),
                Number::make('Number of Rooms')->required()->sortable(),
                Select::make('Status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'unknown' => 'unknown',
                    ])
                    ->displayUsingLabels()
                    ->onlyOnForms(),
                Badge::make('Status')->map([
                    'inactive' => 'danger',
                    'active' => 'success',
                    'unknown' => 'warning',
                ]),
            ])),

            (new Panel('Admin Details',[
                BelongsTo::make('Created By','createdBy','App\Nova\User')
                    ->onlyOnDetail(),
                BelongsTo::make('Updated By','createdBy','App\Nova\User')
                    ->onlyOnDetail(),
                Date::make('Updated At')->onlyOnDetail(),
                Date::make('Created At')->onlyOnDetail(),
            ])),

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
