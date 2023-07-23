<?php

use Illuminate\Support\Str;

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'user_model' => 'App\Models\User',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'user_resource' => 'App\Nova\User',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'role_resource_group' => 'Other',

    /*
    |--------------------------------------------------------------------------
    | Database table names
    |--------------------------------------------------------------------------
    | When using the "HasRoles" trait from this package, we need to know which
    | table should be used to retrieve your roles. We have chosen a basic
    | default value but you may easily change it to any table you like.
    */

    'table_names' => [
        'roles' => 'roles',

        'role_permission' => 'role_permission',

        'role_user' => 'role_user',

        'users' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => getPermissions()
];

function getPermissions(){
    $collection = collect([
        \App\Models\User::class,
        \Pktharindu\NovaPermissions\Role::class,
        \App\Models\Membership::class,
        \App\Models\Stable::class,
        \App\Models\MemberAccess::class,
        \App\Models\MembershipCategory::class,
        \App\Models\Subscription::class,
        \App\Models\SubscriptionCategory::class,
        \App\Models\Occupation::class,
        \App\Models\Profession::class,
        \App\Models\Invoice::class,
        \App\Models\StableCharge::class,
        \App\Models\Penalty::class,
        \App\Models\PenaltyCharge::class,
        \App\Models\Pitch::class,
        \App\Models\ChukkerBooking::class,
        \App\Models\Chukker::class,
        \App\Models\Post::class,
        \App\Models\PostCategory::class,
        \App\Models\Document::class,
        \App\Models\DocumentCategory::class,
    ]);

    $perm = [];

    $perm += array(
            'view.member' => [
                'display_name' => 'View member area',
                'description'  => 'Can view member area',
                'group'        => 'System',
            ],
        'duty.captain' => [
            'display_name' => 'Captain duties',
            'description'  => 'Can perform captain duties',
            'group'        => 'Management',
        ],
        'duty.treasurer' => [
            'display_name' => 'Treasurer duties',
            'description'  => 'Can perform treasurer duties',
            'group'        => 'Management',
        ],
        'duty.president' => [
            'display_name' => 'President duties',
            'description'  => 'Can perform President Duties',
            'group'        => 'Management',
        ],
        'duty.first_vice' => [
            'display_name' => 'First Vice duties',
            'description'  => 'Can perform First Vice Duties',
            'group'        => 'Management',
        ],
        'duty.pony' => [
            'display_name' => 'Pony Welfare duties',
            'description'  => 'Can perform Pony Welfare Duties',
            'group'        => 'Management',
        ],
        'duty.secretary' => [
            'display_name' => 'Secretary duties',
            'description'  => 'Can perform Secretary Duties',
            'group'        => 'Management',
        ],
        'duty.grounds' => [
            'display_name' => 'Grounds duties',
            'description'  => 'Can perform Grounds Duties',
            'group'        => 'Management',
        ],
        'duty.house' => [
            'display_name' => 'House duties',
            'description'  => 'Can perform House Duties',
            'group'        => 'Management',
        ],
//        'view.logs' => [
//            'display_name' => 'View logs',
//            'description'  => 'Can view logs',
//            'group'        => 'System',
//        ],
//        'view.backups' => [
//            'display_name' => 'View backups',
//            'description'  => 'Can view backups',
//            'group'        => 'System',
//        ],
//        'view.reports' => [
//            'display_name' => 'View reports',
//            'description'  => 'Can view report',
//            'group'        => 'System',
//        ],
//        'view.insights' => [
//            'display_name' => 'View insights',
//            'description'  => 'Can view insights',
//            'group'        => 'System',
//        ],
    );

    foreach($collection as $item) {
        $group = getGroupName($item);
        $permission = getPermissionName($item);

        $x = array(
            'see.' . $permission => [
                'display_name' => 'View any ' . $permission,
                'description' => 'Can view any ' . $permission,
                'group' => $group,
            ],
            'view.' . $permission => [
                'display_name' => 'View ' . $permission,
                'description' => 'Can view ' . $permission,
                'group' => $group,
            ],
            'create.'.$permission => [
                'display_name' => 'Create '.$permission,
                'description'  => 'Can create '.$permission,
                'group'        => $group,
            ],

            'edit.'.$permission => [
                'display_name' => 'Edit '.$permission,
                'description'  => 'Can edit '.$permission,
                'group'        => $group,
            ],

            'delete.'.$permission => [
                'display_name' => 'Delete '.$permission,
                'description'  => 'Can delete '.$permission,
                'group'        => $group,
            ],
        );

        $perm += $x;
    }
    return $perm;
}

/**
 * Get group name based on the model class provided
 *
 * @param $class
 *
 * @return string
 */
function getGroupName($class)
{
    return Str::plural(Str::title(Str::snake(class_basename($class), ' ')));
}

/**
 * Get permission name based on the model class provided
 *
 * @param $class
 *
 * @return string
 */
function getPermissionName($class)
{
    return Str::plural(Str::snake(class_basename($class), ' '));
}
