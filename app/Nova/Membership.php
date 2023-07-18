<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\UiAvatar;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Membership extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Membership>
     */
    public static $model = \App\Models\Membership::class;

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
            ID::make()->sortable(),
//            UiAvatar::make('Avatar', 'surname'),
            Image::make('Profile Photo')->disk('public'),

            (BelongsTo::make('User')),

            (new Panel('Bio Data', [Text::make('Surname')
                ->required()
                ->sortable(),
            Text::make('First Name')
                ->required()
                ->sortable(),
            Text::make('Middle Name')
                ->sortable(),
            Email::make('Email')
                ->required(),
            Text::make('Mobile')
                ->required(),
            Text::make('Alternate Mobile','alt_mobile')
                ->required(),
            Text::make('Address')
                ->required(),
            Date::make('Date of Birth')
            ,
            Select::make('Gender')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ])->displayUsingLabels(),
            Select::make('Nationality')
                ->options([
                    'Nigerian' => 'Nigerian',
                    'Other' => 'Other',
                ])->displayUsingLabels(),
            Select::make('Blood Group')
                ->options([
                    'A+' => 'A+',
                    'A-' => 'A-',
                    'B+' => 'B+',
                    'B-' => 'B-',
                    'AB+' => 'AB+',
                    'AB-' => 'AB-',
                    'O+' => 'O+',
                    'O-' => 'O-',
                ])->displayUsingLabels(),
            Select::make('Genotype')
                ->options([
                    'AA' => 'AA',
                    'AS' => 'AS',
                    'AC' => 'AC',
                    'SS' => 'SS',
                    'SC' => 'SC',
                    'CC' => 'CC',
                    'OO' => 'OO',
                ])->displayUsingLabels(),]
            )),
            (new Panel('Employment Details',[
                    Select::make('Occupation')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                        ])->displayUsingLabels(),
                    Select::make('Profession')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                        ])->displayUsingLabels(),
                    Text::make('Name of Organization')
                        ->required(),
                    Select::make('Type of Organization')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                        ])->displayUsingLabels(),
                    Text::make('Office Address')
                        ->required(),
                ]
            )),
            (new Panel('Area of Interest',[
                Select::make('Area of Interest')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])->displayUsingLabels(),
                Select::make('Membership Category','category')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])->displayUsingLabels(),
                Boolean::make('other_membership'),
                Text::make('Name of Club','other_club'),
                Boolean::make('Have been involved in Polo','involved_in_polo'),
                Boolean::make('Horse Owner','horse_owner'),
                Number::make('Number of Horses'),
            ])),

            ( new Panel('Emergency Contact',[
                Text::make('Emergency Contact Name'),
                Text::make('Emergency Contact Mobile'),
                Text::make('Emergency Contact Relationship'),
            ])),

            ( new Panel('Official Details',[
                BelongsTo::make('Proposed By','proposedBy','App\Nova\Membership'),
                BelongsTo::make('Seconded By','secondedBy','App\Nova\Membership'),
                BelongsTo::make('Approved By','approvedBy','App\Nova\User'),
                Select::make('Membership Status')
                    ->options([
                        'inactive' => 'Inactive',
                        'active' => 'Active',
                        'pending' => 'Pending',
                        'suspended' => 'Suspended',
                    ])
                    ->displayUsingLabels()
                    ->onlyOnForms(),
                Badge::make('Membership Status')->map([
                    'inactive' => 'info',
                    'active' => 'success',
                    'pending' => 'warning',
                    'suspended' => 'danger',
                ]),
                Select::make('Subscription Status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->displayUsingLabels()
                    ->onlyOnForms(),
                Badge::make('Subscription Status')->map([
                    'inactive' => 'danger',
                    'active' => 'success',
                ]),
                Number::make('Player Handicap')->sortable(),
                Date::make('Year of Registration','membership_since')->sortable(),
                Trix::make('Remarks'),

                HasMany::make('Stables'),
            ]))






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
