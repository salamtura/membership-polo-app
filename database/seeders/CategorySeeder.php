<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professions = [
            'Medical Doctor',
            'Engineer',
            'Teacher',
            'Lawyer',
            'Artist',
            'Entrepreneur',
            'Military',
            'Police',
            'Para-Military',
            'Architect',
            'IT',
            'Politician',
            'Diplomacy',
            'Accountant',
            'Banker',
            'Veterinary Doctor',
            'Other',
            // Add more professions as needed
        ];

        foreach ($professions as $profession) {
            DB::table('professions')->insert([
                'name' => $profession,
            ]);
        }

        $occupations = [
            'Public Servant',
            'Civil Servant',
            'Private',
            'Self Employed',
            'Force',
            'Unemployed',
            'Student',
            'Diplomat'
            // Add more professions as needed
        ];

        foreach ($occupations as $occupation) {
            DB::table('occupations')->insert([
                'name' => $occupation,
            ]);
        }
    }
}
