<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Pktharindu\NovaPermissions\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
        ]);

        $user = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'is_admin' => true,
            'mobile' => '0801111111',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('administrator');



    }
}
