<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job listings from the file
        $jobListings = include database_path('seeders/data/job_listings.php');

        // Get test user id
        $testUserId = User::where('email', 'test@email.com')->first()->id;

        // Get all other user ids
        $userIds = User::where('email', '!=', 'test@email.com')->pluck('id')->toArray();
        
        // Get user ids from user model
        $userIds = User::pluck('id')->toArray();

        foreach($jobListings as $index => &$listing) {
            if ($index < 2) {
                // Assign test user id to the first 2 job listings
                $listing['user_id'] = $testUserId;
            } else {
                // Assign a random user id to the remaining job listings
                $listing['user_id'] = $userIds[array_rand($userIds)];
            }

            // Randomly assign a user id to each job listing
            $listing['user_id'] = $userIds[array_rand($userIds)];

            // Add timestamps to each job listing
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        // Insert job listings into the database
        DB::table('job_listings')->insert($jobListings);
        echo 'Jobs created successfully.';
    }
}
