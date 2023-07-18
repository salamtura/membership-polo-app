<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class MemberAccess extends Resource
{
    public static $canImportResource = true;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\MemberAccess>
     */
    public static $model = \App\Models\MemberAccess::class;

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
        'monile','name','access_code'
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
            Text::make('Name')
                ->required()
                ->filterable()
                ->sortable()
            ,
            Text::make('Mobile')
                ->required()
                ->filterable()
                ->sortable()
            ,
            Text::make('Access Code')
                ->required()
                ->filterable()
                ->sortable()
                ->hideWhenCreating()
            ,
            Select::make('Access Type')
                ->options([
                    'NEW' => 'New Member',
                    'EXISTING' => 'Existing Member',
                    'EXISTING_JUNIOR' => 'Existing Junior Member',
            ])->displayUsingLabels()
            ,
            Select::make('Membership Year','reg_year')
                ->options([
                    '2010' => '2010',
                    '2011' => '2011',
                    '2012' => '2012',
                    '2013' => '2013',
                    '2014' => '2014',
                    '2015' => '2015',
                    '2016' => '2016',
                    '2017' => '2017',
                    '2018' => '2018',
                    '2019' => '2019',
                    '2020' => '2020',
                    '2021' => '2021',
                    '2022' => '2022',
                    '2023' => '2023',
                ])->displayUsingLabels()
            ,
            Select::make('Membership Category','category')
                ->options([
                    'FULL' => 'Full',
                    'MILITARY' => 'Military',
                    'SOCIAL' => 'Social',
                    'HON' => 'Honorary',
                ])->displayUsingLabels()
            ,

            Select::make('Status')
                ->options([
                    'ACTIVE' => 'Active',
                    'INACTIVE' => 'Inactive',
                ])->displayUsingLabels()
            ->onlyOnForms(),

            Badge::make('Status')->map([
                'INACTIVE' => 'danger',
                'ACTIVE' => 'success',
            ]),

            Select::make('Enrolment Status')
                ->options([
                    'PENDING' => 'Pending',
                    'ENROLLED' => 'Enrolled',
                ])->displayUsingLabels()
            ->onlyOnForms(),

            Badge::make('Enrolment Status')->map([
                'PENDING' => 'danger',
                'ENROLLED' => 'success',
            ]),
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
