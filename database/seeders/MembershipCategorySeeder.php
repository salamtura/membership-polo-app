<?php

namespace Database\Seeders;

use App\Models\MembershipCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = MembershipCategory::create([
            'name' => 'Full Membership',
            'slug' => 'full_membership',
            'amount' => 0,
        ],
            [
                'name' => 'Military Membership',
                'slug' => 'military',
                'amount' => 0,
            ],
            [
                'name' => 'Other Force',
                'slug' => 'other_force',
                'amount' => 0,
            ],
            [
                'name' => 'Social Membership',
                'slug' => 'social_membership',
                'amount' => 5000000,
            ]);
    }
}
