<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Pktharindu\NovaPermissions\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrator = Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        $member = Role::create([
            'name' => 'Member',
            'slug' => 'member',
        ]);

        $administrator->setPermissions(collect(config('nova-permissions.permissions'))->keys()->toArray());
        $administrator->revoke('view.member');
        $member->grant('view.member');
    }
}
