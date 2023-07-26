<?php

namespace Database\Seeders;

use App\Models\SubscriptionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = SubscriptionCategory::create([
            'name' => 'Full Subscription',
            'slug' => 'full_subscription',
            'amount' => 0,
        ],
            [
                'name' => 'Military Subscription',
                'slug' => 'military',
                'amount' => 0,
            ],
            [
                'name' => 'Force Subscription',
                'slug' => 'force_subscription',
                'amount' => 0,
            ],
            [
                'name' => 'Social Subscription',
                'slug' => 'social_subscription',
                'amount' => 0,
            ]);
    }
}
