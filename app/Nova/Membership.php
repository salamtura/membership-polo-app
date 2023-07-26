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
    public static $title = 'user.name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'user.name', 'mobile','email'
    ];

    /**
     * The visual style used for the table. Available options are 'tight' and 'default'.
     *
     * @var string
     */
    public static $tableStyle = 'tight';

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
            Image::make('Profile Photo')
                ->rounded()
                ->disableDownload()
                ->disk('public'),

            (BelongsTo::make('User')),

            (new Panel('Bio Data', [
                Text::make('Surname')
                    ->hideFromIndex()
                    ->required()
                    ->sortable(),
                Text::make('First Name')
                    ->hideFromIndex()
                    ->required()
                    ->sortable(),
                Text::make('Middle Name')
                    ->hideFromIndex()
                    ->sortable(),
                Email::make('Email')
                    ->hideFromIndex()
                    ->required(),
                Text::make('Mobile')
                    ->required(),
                Text::make('Alternate Mobile','alt_mobile')
                    ->hideFromIndex()
                    ->required(),
                Text::make('Address')
                    ->hideFromIndex()
                    ->required(),
                Date::make('Date of Birth')
                    ->required()
                    ->hideFromIndex()
                ,
                Select::make('Gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])->displayUsingLabels()
                    ->hideFromIndex(),
                Select::make('Nationality')
                    ->options([
                        'Nigerian' => 'Nigerian',
                        'Other' => 'Other',
                    ])->displayUsingLabels()
                    ->hideFromIndex(),
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
                    ])->displayUsingLabels()
                    ->hideFromIndex(),
                Select::make('Genotype')
                    ->options([
                        'AA' => 'AA',
                        'AS' => 'AS',
                        'AC' => 'AC',
                        'SS' => 'SS',
                        'SC' => 'SC',
                        'CC' => 'CC',
                        'OO' => 'OO',
                    ])->displayUsingLabels()
                    ->hideFromIndex(),
                    ]
            )),
            (new Panel('Employment Details',[
                BelongsTo::make('Occupation')
                        ->hideFromIndex(),
                    BelongsTo::make('Profession')
                        ->hideFromIndex(),

                    Text::make('Name of Organization')
                        ->hideFromIndex()
                        ->required(),
                    Select::make('Type of Organization')
                        ->hideFromIndex()
                        ->options([
                            'Private' => 'Private',
                            'Government' => 'Government',
                            'Force' => 'Force',
                            'NGO' => 'NGO',
                            'International' => 'International',
                            'Other' => 'Other',
                        ])->displayUsingLabels(),
                    Text::make('Office Address')
                        ->hideFromIndex()
                        ->required(),
                ]
            )),
            (new Panel('Area of Interest',[
                Select::make('Area of Interest')
                    ->hideFromIndex()
                    ->options([
                        'Polo Club Membership' => 'Polo Club Membership',
                        'Social Membership' => 'Social Membership',
                    ])->displayUsingLabels(),


                Boolean::make('Other Club Membership','other_membership')
                    ->hideFromIndex(),
                Text::make('Name of Club','other_club')
                    ->hideFromIndex(),
                Boolean::make('Have been involved in Polo','involved_in_polo')
                    ->hideFromIndex(),
                Boolean::make('Horse Owner','horse_owner')
                    ->hideFromIndex(),
                Number::make('Number of Horses')
                    ->hideFromIndex(),
            ])),

            ( new Panel('Emergency Contact',[
                Text::make('Emergency Contact Name')
                    ->hideFromIndex(),
                Text::make('Emergency Contact Mobile')
                    ->hideFromIndex(),
                Text::make('Emergency Contact Relationship')
                    ->hideFromIndex(),
            ])),

            ( new Panel('Official Details',[
                BelongsTo::make('Proposed By','proposedBy','App\Nova\Membership')
                    ->hideFromIndex(),
                BelongsTo::make('Seconded By','secondedBy','App\Nova\Membership')
                    ->hideFromIndex(),
                BelongsTo::make('Approved By','approvedBy','App\Nova\User')
                    ->hideFromIndex(),
                BelongsTo::make('Membership Category')
                    ->hideFromIndex(),
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
                Number::make('Handicap','player_handicap')
                    ->sortable(),
                Date::make('Year of Registration','membership_since')
                    ->hideFromIndex()
                    ->sortable(),
                Trix::make('Remarks')
                    ->hideFromIndex(),

                HasMany::make('Stables'),
                HasMany::make('Subscriptions'),
                HasMany::make('Penalties'),
                HasMany::make('Invoices'),
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
